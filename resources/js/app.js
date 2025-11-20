import "./bootstrap";
import { initMap } from "./map/map";
import { initChart } from "./charts/sensorChart";
import "./floatingbutton";

document.addEventListener("DOMContentLoaded", () => {
    initMap();
    initChart();
});
