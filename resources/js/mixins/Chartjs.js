export default {
    props: [
        "todayIncidents",
        "monthlyIncidents",
        "yearlyIncidents",
        "yearsOfYearlyIncidents",
        "weeklyIncidents",
        "labelsOfWeeklyIncidents"
    ],
    data() {
        return {
            montlyData: this.monthlyIncidents,
            todayData: this.todayIncidents,

            extractedYearsOfYearlyIncidents: this.yearsOfYearlyIncidents,
            yearlyData: this.yearlyIncidents,

            extractedlabelsOfWeeklyIncidents: this.labelsOfWeeklyIncidents,
            weeklyData: this.weeklyIncidents
        };
    },
    methods: {
        divElementToHook() {
            return document.getElementById("myChart").getContext("2d");
        },
        // Function runs on chart type select update
        updateChartType() {
            // Since you can't update chart type directly in Charts JS you must destroy original chart and rebuild
            var chart = this.myChart();
            chart.destroy();
            chart = new Chart(this.divElementToHook(), {
                type: "line",
                data: this[document.getElementById("chartType").value]()
            });
        },
        myChart() {
            Chart.defaults.global.defaultFontFamily = "monospace";
            return new Chart(this.divElementToHook(), {
                type: "line",
                data: this.monthlyChart()
            });
        },

        monthlyChart() {
            return {
                labels: [
                    "January",
                    "February",
                    "March",
                    "April",
                    "May",
                    "June",
                    "July",
                    "August",
                    "September",
                    "October",
                    "November",
                    "December"
                ],
                datasets: [
                    {
                        label: "Incidents as at this year!",
                        fill: false,
                        backgroundColor: "rgb(190, 99, 255, 0.25)",
                        borderColor: "rgb(190, 99, 255)",
                        data: this.montlyData
                    }
                ]
            };
        },

        weeklyChart() {
            return {
                labels: this.extractedlabelsOfWeeklyIncidents,
                datasets: [
                    {
                        label: "Incidents for weeks in the year!",
                        fill: true,
                        backgroundColor: "rgba(255, 99, 132, 0.25)",
                        borderColor: "rgb(255, 99, 132)",
                        data: this.weeklyData
                    }
                ]
            };
        },

        yearlyChart() {
            return {
                labels: this.extractedYearsOfYearlyIncidents,
                datasets: [
                    {
                        label: "Incidents for the period of 10 years (Decade)!",
                        fill: true,
                        backgroundColor: "rgba(255, 99, 132, 0.25)",
                        borderColor: "rgb(255, 99, 132)",
                        data: this.yearlyData
                    }
                ]
            };
        },

        todayChart() {
            return {
                labels: ["Today"],
                datasets: [
                    {
                        label: "Incidents for today!",
                        fill: true,
                        backgroundColor: "#ECEDF1",
                        borderColor: "rgb(255, 99, 132)",
                        data: this.yearlyData
                    }
                ]
            };
        }
    }
};
