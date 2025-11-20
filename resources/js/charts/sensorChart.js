import Highcharts from "highcharts";
import {
    areas,
    getMarkerStatus,
    updateSensorUI,
    addNotification,
} from "../map/map";

let chart;
let autoRotateInterval;
let rotateIndex = 0;
let activeArea = null;

export function generateDataForStatus(status) {
    const now = Date.now();
    const points = 100;

    function generateValues(min, max) {
        return Array.from({ length: points }, (_, i) => ({
            x: now - (points - i) * 1000,
            y: min + Math.random() * (max - min),
        }));
    }

    if (status === "normal")
        return {
            rain: generateValues(0, 5),
            vibration: generateValues(0, 10),
            humidity: generateValues(60, 65),
        };

    if (status === "waspada")
        return {
            rain: generateValues(5, 10),
            vibration: generateValues(10, 30),
            humidity: generateValues(55, 60),
        };

    if (status === "bahaya")
        return {
            rain: generateValues(10, 15),
            vibration: generateValues(30, 60),
            humidity: generateValues(50, 55),
        };
}

export function updateChart(status, areaName = "") {
    if (areaName) activeArea = areaName;
    const data = generateDataForStatus(status);

    chart.series[0].setData(data.rain, false);
    chart.series[1].setData(data.vibration, false);
    chart.series[2].setData(data.humidity, true);

    chart.setTitle({
        text: areaName ? `Sensor Area: ${areaName}` : "Sensor Area",
    });
}

export function initChart() {
    const defaultArea = areas[0].name;
    activeArea = defaultArea;
    const defaultStatus = getMarkerStatus(defaultArea);

    const data = generateDataForStatus(defaultStatus);
    updateSensorUI(defaultStatus);
    Highcharts.setOptions({
        time: {
            useUTC: false,
        },
    });

    chart = Highcharts.chart("sensor-chart", {
        chart: { zoomType: "xy", backgroundColor: "transparent" },
        title: {
            text: `Sensor Area: ${defaultArea}`,
            align: "center",
            style: { fontSize: "16px", fontWeight: "600" },
        },

        xAxis: {
            type: "datetime",
            tickInterval: 1000 * 15,
            tickPixelInterval: 80,
            labels: {
                formatter: function () {
                    return Highcharts.dateFormat("%H:%M:%S", this.value);
                },
            },
        },
        yAxis: { title: { text: "Nilai Sensor" }, gridLineWidth: 0.3 },
        tooltip: { shared: true },

        series: [
            {
                name: "Curah Hujan",
                type: "spline",
                data: data.rain,
                color: "#ef4444",
                lineWidth: 1,
            },
            {
                name: "Getaran",
                type: "line",
                data: data.vibration,
                color: "#fbbf24",
                lineWidth: 1,
            },
            {
                name: "Kelembapan",
                type: "areaspline",
                data: data.humidity,
                color: "#22c55e",
                fillOpacity: 0.3,
                lineWidth: 1,
            },
        ],
    });
    if (defaultStatus !== "normal") {
        addNotification(defaultArea, defaultStatus);
    }
    startAutoRotate();
}

function startAutoRotate() {
    if (autoRotateInterval) clearInterval(autoRotateInterval);

    autoRotateInterval = setInterval(() => {
        rotateIndex = (rotateIndex + 1) % areas.length;

        const nextArea = areas[rotateIndex];
        const status = getMarkerStatus(nextArea.name);

        updateChart(status, nextArea.name);
        updateSensorUI(status);

        if (status !== "normal") {
            addNotification(nextArea.name, status);
        }
    }, 300000); // 5 menit
}

setInterval(() => {
    const now = Date.now();
    const status = getMarkerStatus(activeArea);

    let range = {
        normal: {
            rain: [0, 5],
            vibration: [0, 10],
            humidity: [60, 65],
        },
        waspada: {
            rain: [5, 10],
            vibration: [10, 30],
            humidity: [55, 60],
        },
        bahaya: {
            rain: [10, 15],
            vibration: [30, 60],
            humidity: [50, 55],
        },
    };

    const r = range[status];

    const rain = r.rain[0] + Math.random() * (r.rain[1] - r.rain[0]);
    const vibration =
        r.vibration[0] + Math.random() * (r.vibration[1] - r.vibration[0]);
    const humidity =
        r.humidity[0] + Math.random() * (r.humidity[1] - r.humidity[0]);

    chart.series[0].addPoint([now, rain], false, true);
    chart.series[1].addPoint([now, vibration], false, true);
    chart.series[2].addPoint([now, humidity], true, true);
}, 2000);
