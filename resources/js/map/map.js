import L from "leaflet";
import { updateChart } from "../charts/sensorChart";

export const areas = [
    { name: "Bandar", latlng: [-7.951704, 111.219496] },
    { name: "Tegalombo", latlng: [-8.084680, 111.246936] },
    { name: "Nawangan", latlng: [-8.038403, 111.185008] },
];

export const markerList = {};

export function getMarkerStatus(areaName) {
    return markerList[areaName]?.status || "normal";
}

function createColoredMarker(color) {
    const svgIcon = `<div class="pulse-wrapper pulse-${color}">
        <svg width="30" height="42" viewBox="0 0 24 24" fill="${color}" stroke="white" stroke-width="2">
            <path d="M12 2C8 2 5 5 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-4-3-7-7-7z"/>
            <circle cx="12" cy="9" r="3" fill="white"/>
        </svg>
    </div>`;

    return L.divIcon({
        html: svgIcon,
        className: "",
        iconSize: [30, 42],
        iconAnchor: [15, 42],
    });
}

function randomStatus() {
    const statuses = ["normal", "waspada", "bahaya"];
    const colors = { normal: "green", waspada: "yellow", bahaya: "red" };
    const status = statuses[Math.floor(Math.random() * statuses.length)];
    return { status, color: colors[status] };
}

export function updateSensorUI(status) {
    const container = document.getElementById("sensor-status");
    container.querySelectorAll("div[data-status]").forEach((el) => {
        if (el.dataset.status === status) {
            el.classList.add("active");
        } else {
            el.classList.remove("active");
        }
    });
}

function capitalize(word) {
    return word.charAt(0).toUpperCase() + word.slice(1);
}

const notificationsList = document.getElementById("notifications-list");

export function addNotification(areaName, status) {
    if (status === "normal") return;

    const colors = {
        waspada: "yellow",
        bahaya: "red",
    };

    const li = document.createElement("li");
    li.className = "py-2 rounded-lg hover:bg-gray-100 flex items-start gap-4";

    li.innerHTML = `
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor"
            class="size-5.5 mt-1 text-${colors[status]}-500 bg-${colors[status]}-100 p-1 rounded-full">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="${
                    status === "danger"
                        ? "M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z"
                        : "M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z"
                }" />
        </svg>
        <div class="flex flex-col gap-1">
           <span>${areaName} dalam status <span class="font-medium">${capitalize(status)}</span></span>

            <span class="text-xs text-gray-400">Baru saja</span>
        </div>
    `;

    notificationsList.prepend(li);

    while (notificationsList.children.length > 4) {
        notificationsList.removeChild(notificationsList.lastChild);
    }
}

export function initMap() {
    const map = L.map("map").setView([-7.951704, 111.219496], 10);

    L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
        maxZoom: 18,
        attribution: "© OpenStreetMap",
    }).addTo(map);

    const markers = [];

    areas.forEach((area) => {
        const { status, color } = randomStatus();
        const marker = L.marker(area.latlng, {
            icon: createColoredMarker(color),
        })
            .addTo(map)
            .bindPopup(`${area.name} - Status: ${capitalize(status)}`);
        marker.status = status;
        markerList[area.name] = marker;

        marker.on("click", () => {
            updateChart(marker.status, area.name);
            updateSensorUI(marker.status);
            addNotification(area.name, marker.status);
        });

        markers.push(marker);
    });

    setInterval(() => {
        markers.forEach((marker) => {
            const { status, color } = randomStatus();
            marker.status = status;
            marker.setIcon(createColoredMarker(color));
            markerList[marker.areaName].status = status;
            addNotification(marker.areaName, status);
            marker
                .getPopup()
                .setContent(
                    `${marker.options.title || "Area"} - Status: ${capitalize(status)}`,
                );
        });
    }, 300000); // 5 menit
}
