    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    <!-- Libs JS -->
    <script src="{{ asset('frontend/libs/apexcharts/dist/apexcharts.min.js') }}" defer></script>
    {{-- <script src="{{ asset('dist/libs/jsvectormap/dist/js/jsvectormap.min.js') }}" defer></script>
    <script src="{{ asset('dist/libs/jsvectormap/dist/maps/world.js') }}" defer></script>
    <script src="{{ asset('dist/libs/jsvectormap/dist/maps/world-merc.js') }}" defer></script> --}}
    <!-- Tabler Core -->
    <script src="{{ asset('frontend/js/tabler.min.js') }}" defer></script>
    <script src="{{ asset('frontend/js/demo.min.js') }}" defer></script>
    @if (Session::has('message'))
        <script>
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            var type = "{{ Session::get('type') }}";
            var message = "{{ Session::get('message') }}";
            toastr[type](message);
        </script>
    @endif
    <script>
        window.addEventListener('alert', ({
            detail: {
                type,
                message
            }
        }) => {
            toastr[type](message);
        })
    </script>
    <script>
        $('textarea').keyup(function() {
            $(this).prev().find('.current_count').text($(this).val().length);
        });
    </script>
    @livewireScripts
    {{-- chart-demo-devices --}}
    {{-- <script>
        // @formatter:off
        document.addEventListener("DOMContentLoaded", function() {
            var top_devices = [];
            var top_devices_count = [];
            jQuery.each(data.top_devices, function(i, val) {
                top_devices.push(val.device);
                top_devices_count.push(val.devices);

            });
            window.ApexCharts && (new ApexCharts(document.getElementById('chart-demo-devices'), {
                chart: {
                    type: "donut",
                    fontFamily: 'inherit',
                    height: 240,
                    sparkline: {
                        enabled: true
                    },
                    animations: {
                        enabled: false
                    },
                },
                fill: {
                    opacity: 1,
                },
                series: top_devices_count,
                labels: top_devices,
                grid: {
                    strokeDashArray: 4,
                },
                colors: ["#206bc4", "#79a6dc", "#d2e1f3", "#e9ecf1"],
                legend: {
                    show: true,
                    position: 'bottom',
                    offsetY: 12,
                    markers: {
                        width: 10,
                        height: 10,
                        radius: 100,
                    },
                    itemMargin: {
                        horizontal: 8,
                        vertical: 8
                    },
                },
                tooltip: {
                    fillSeriesColor: false
                },
            })).render();
        });
        // @formatter:on
    </script> --}}
    {{-- chart-demo-browsers --}}
    {{-- <script>
        // @formatter:off
        document.addEventListener("DOMContentLoaded", function() {
            var top_browsers = [];
            var top_browsers_count = [];
            jQuery.each(data.top_browsers, function(i, val) {
                top_browsers.push(val.browser);
                top_browsers_count.push(val.browsers);

            });
            window.ApexCharts && (new ApexCharts(document.getElementById('chart-demo-browsers'), {
                chart: {
                    type: "donut",
                    fontFamily: 'inherit',
                    height: 240,
                    sparkline: {
                        enabled: true
                    },
                    animations: {
                        enabled: false
                    },
                },
                fill: {
                    opacity: 1,
                },
                series: top_browsers_count,
                labels: top_browsers,
                grid: {
                    strokeDashArray: 4,
                },
                colors: ["#206bc4", "#79a6dc", "#d2e1f3", "#e9ecf1"],
                legend: {
                    show: true,
                    position: 'bottom',
                    offsetY: 12,
                    markers: {
                        width: 10,
                        height: 10,
                        radius: 100,
                    },
                    itemMargin: {
                        horizontal: 8,
                        vertical: 8
                    },
                },
                tooltip: {
                    fillSeriesColor: false
                },
            })).render();
        });
        // @formatter:on
    </script> --}}
    {{-- chart-demo-os --}}
    {{-- <script>
        // @formatter:off
        document.addEventListener("DOMContentLoaded", function() {
            var top_operating_systems = [];
            var top_operating_systems_count = [];
            jQuery.each(data.top_operating_systems, function(i, val) {
                top_operating_systems.push(val.operating_system);
                top_operating_systems_count.push(val.os);

            });
            window.ApexCharts && (new ApexCharts(document.getElementById('chart-demo-os'), {
                chart: {
                    type: "donut",
                    fontFamily: 'inherit',
                    height: 240,
                    sparkline: {
                        enabled: true
                    },
                    animations: {
                        enabled: false
                    },
                },
                fill: {
                    opacity: 1,
                },
                series: top_operating_systems_count,
                labels: top_operating_systems,
                grid: {
                    strokeDashArray: 4,
                },
                colors: ["#206bc4", "#79a6dc", "#d2e1f3", "#e9ecf1"],
                legend: {
                    show: true,
                    position: 'bottom',
                    offsetY: 12,
                    markers: {
                        width: 10,
                        height: 10,
                        radius: 100,
                    },
                    itemMargin: {
                        horizontal: 8,
                        vertical: 8
                    },
                },
                tooltip: {
                    fillSeriesColor: false
                },
            })).render();
        });
        // @formatter:on
    </script> --}}
    @stack('scripts')
