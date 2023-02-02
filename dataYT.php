<?php include 'partials/header.php' ?>

<!-- const apiKey = "AIzaSyCvc0tIeB58Sz0hpDFSEYxDXFT8tg0VGGQ"; -->
<!-- const channelId = "UCV6ZBT0ZUfNbtZMbsy-L3CQ"; -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="container"><br>
                <button id="deleteButton" class="btn btn-light shadow-1 border border-1">Hide Chart</button>
                <br><br>
                <div class="card">
                    <script src="https://code.highcharts.com/highcharts.js"></script>

                    <div id="chart"></div>
                    <script>
                        const apiKey = "AIzaSyCvc0tIeB58Sz0hpDFSEYxDXFT8tg0VGGQ";
                        const channelId = "UCV6ZBT0ZUfNbtZMbsy-L3CQ";
                        let chart = null;

                        const fetchData = () => {
                            fetch(`https://www.googleapis.com/youtube/v3/channels?part=statistics&id=${channelId}&key=${apiKey}`)
                                .then(response => response.json())
                                .then(data => {
                                    const views = data.items[0].statistics.viewCount;

                                    chart = Highcharts.chart("chart", {
                                        chart: {
                                            type: "bar"
                                        },
                                        title: {
                                            text: "YouTube Channel Analytics"
                                        },
                                        yAxis: {
                                            title: {
                                                text: "View Count"
                                            }
                                        },
                                        series: [{
                                            name: "Views",
                                            data: [views]   
                                        }]
                                    });
                                });
                        };

                        document.getElementById("deleteButton").addEventListener("click", function() {
                            if (chart) {
                                chart.destroy();
                                chart = null;
                                document.getElementById("deleteButton").textContent = "Show Chart";
                            } else {
                                fetchData();
                                document.getElementById("deleteButton").textContent = "Hide Chart";
                            }
                        });

                        fetchData();
                    </script>
                </div>
            </div>
        </div>



    </div>
</div>
</div>


<?php include 'partials/footer.php' ?>