<div class="mt-6 p-6 bg-[#0f1115] rounded-xl border border-gray-700 shadow-2xl relative overflow-hidden">

    {{-- Header --}}
    <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
        <h4 class="text-white font-bold text-lg flex items-center gap-2">
            📊 Statistik Aktivitas Siswa
        </h4>

        <div class="flex items-center gap-2 bg-gray-800 p-1 rounded-lg border border-gray-700">
            <button id="btnRemoveBar"
                class="px-3 py-1.5 rounded-md bg-red-500/10 text-red-400 hover:bg-red-500 hover:text-white transition-all text-xs font-bold">
                Hapus
            </button>

            <span class="text-gray-400 text-xs px-2" id="barCountDisplay">3 Data</span>

            <button id="btnAddBar"
                class="px-3 py-1.5 rounded-md bg-green-500/10 text-green-400 hover:bg-green-500 hover:text-white transition-all text-xs font-bold">
                Tambah
            </button>
        </div>
    </div>

    {{-- Chart --}}
    <div id="chart" class="w-full overflow-x-auto"></div>

    {{-- Slider --}}
    <div id="sliders-container"
        class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-8">
    </div>
</div>

<script src="https://d3js.org/d3.v7.min.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {

    // =========================
    // DATA
    // =========================

    let data = [
        { label: "Belajar", value: 4, color: "#3b82f6" },
        { label: "TikTok", value: 7, color: "#ef4444" },
        { label: "Gaming", value: 6, color: "#10b981" }
    ];

    const maxBars = 8;
    const minBars = 1;

    const chartWidth = 700;
    const chartHeight = 400;

    // =========================
    // SVG
    // =========================

    const svg = d3.select("#chart")
        .append("svg")
        .attr("width", chartWidth)
        .attr("height", chartHeight);

    // =========================
    // SCALE
    // =========================

    const xScale = d3.scaleBand()
        .padding(0.3)
        .range([80, 650]);

    const yScale = d3.scaleLinear()
        .range([300, 50]);

    // =========================
    // AXIS GROUP
    // =========================

    const xAxisGroup = svg.append("g")
        .attr("transform", "translate(0,300)");

    const yAxisGroup = svg.append("g")
        .attr("transform", "translate(80,0)");

    // =========================
    // UPDATE CHART
    // =========================

    function updateChart() {

        // Update scale
        xScale.domain(data.map(d => d.label));
        yScale.domain([0, 10]);

        // Axis
        xAxisGroup.call(d3.axisBottom(xScale));
        yAxisGroup.call(d3.axisLeft(yScale));

        // DATA JOIN
        const bars = svg.selectAll(".bar")
            .data(data);

        // ENTER
        bars.enter()
            .append("rect")
            .attr("class", "bar")

            .attr("x", d => xScale(d.label))
            .attr("width", xScale.bandwidth())

            .attr("y", 300)
            .attr("height", 0)

            .attr("fill", d => d.color)

            // HOVER EFFECT
            .on("mouseenter", function () {
                d3.select(this)
                    .transition()
                    .duration(200)
                    .attr("opacity", 0.7);
            })

            .on("mouseleave", function () {
                d3.select(this)
                    .transition()
                    .duration(200)
                    .attr("opacity", 1);
            })

            .merge(bars)

            // ANIMATION
            .transition()
            .duration(500)

            .attr("x", d => xScale(d.label))
            .attr("width", xScale.bandwidth())

            .attr("y", d => yScale(d.value))
            .attr("height", d => 300 - yScale(d.value))

            .attr("fill", d => d.color);

        // EXIT
        bars.exit().remove();

        // =========================
        // LABEL ANGKA
        // =========================

        const texts = svg.selectAll(".value-text")
            .data(data);

        texts.enter()
            .append("text")
            .attr("class", "value-text")

            .merge(texts)

            .transition()
            .duration(500)

            .attr("x", d => xScale(d.label) + xScale.bandwidth()/2)
            .attr("y", d => yScale(d.value) - 10)

            .attr("text-anchor", "middle")

            .attr("fill", "white")

            .text(d => d.value + " Jam");

        texts.exit().remove();

        document.getElementById('barCountDisplay').innerText =
            data.length + " Data";
    }

    // =========================
    // SLIDER UI
    // =========================

    function renderSliders() {

        const container = document.getElementById("sliders-container");

        container.innerHTML = "";

        data.forEach((item, index) => {

            const div = document.createElement("div");

            div.className =
                "bg-gray-900 border border-gray-700 rounded-xl p-4";

            div.innerHTML = `
                <div class="flex justify-between mb-2">
                    <input type="text"
                        value="${item.label}"
                        id="label-${index}"
                        class="bg-transparent text-white font-bold w-24 border-b border-gray-600 focus:outline-none">

                    <span class="text-gray-400 text-xs">
                        ${item.value} Jam
                    </span>
                </div>

                <input type="range"
                    min="1"
                    max="10"
                    value="${item.value}"
                    id="slider-${index}"
                    class="w-full"
                    style="accent-color:${item.color}">
            `;

            container.appendChild(div);

            // Slider Event
            document.getElementById(`slider-${index}`)
                .addEventListener("input", function(e) {

                    data[index].value = +e.target.value;

                    updateChart();
                    renderSliders();
                });

            // Label Event
            document.getElementById(`label-${index}`)
                .addEventListener("input", function(e) {

                    data[index].label = e.target.value;

                    updateChart();
                });
        });
    }

    // =========================
    // BUTTONS
    // =========================

    document.getElementById("btnAddBar")
        .addEventListener("click", function() {

            if(data.length >= maxBars) return;

            data.push({
                label: "Aktivitas",
                value: 5,
                color: "#" + Math.floor(Math.random()*16777215).toString(16)
            });

            updateChart();
            renderSliders();
        });

    document.getElementById("btnRemoveBar")
        .addEventListener("click", function() {

            if(data.length <= minBars) return;

            data.pop();

            updateChart();
            renderSliders();
        });

    // =========================
    // INIT
    // =========================

    updateChart();
    renderSliders();

});
</script>