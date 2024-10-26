@props([
    'id',
    'name' => '',
    'categories',
    'items',
    'sub_items' => [],
    'base_color' => '--kt-primary',
    'light_color' => '--kt-primary-light',
    'prefix' => '',
    'suffix' => '',
    'description' => ''
])

<!--begin::Chart-->
<div id="line_chart_{{ $id }}" style="height: 350px"></div>
<!--end::Chart-->

@push('custom_scripts')
    <script>
        "use strict";

        // Class definition
        var KTWidgets_{{ $id }} = function () {
            var initChartsWidget_{{ $id }} = function() {
                var element = document.getElementById("line_chart_{{ $id }}");

                if ( !element ) {
                    return;
                }

                var chart = {
                    self: null,
                    rendered: false
                };

                var initChart_{{ $id }} = function() {
                    var height = parseInt(KTUtil.css(element, 'height'));
                    var labelColor = KTUtil.getCssVariableValue('--kt-gray-500');
                    var borderColor = KTUtil.getCssVariableValue('--kt-gray-200');
                    var baseColor = KTUtil.getCssVariableValue('{{$base_color}}');
                    var lightColor = KTUtil.getCssVariableValue('{{$light_color}}');

                    var options = {
                        series: [{
                            name: '{{ $name }}',
                            data: [{{ implode(',',$items) }}]
                        }],
                        chart: {
                            fontFamily: 'inherit',
                            type: 'area',
                            height: 350,
                            toolbar: {
                                show: false
                            }
                        },
                        plotOptions: {

                        },
                        legend: {
                            show: false
                        },
                        dataLabels: {
                            enabled: false
                        },
                        fill: {
                            type: 'solid',
                            opacity: 1
                        },
                        stroke: {
                            curve: 'smooth',
                            show: true,
                            width: 3,
                            colors: [baseColor]
                        },
                        xaxis: {
                            categories: ['{!! implode("','",$categories) !!}'],
                            axisBorder: {
                                show: false,
                            },
                            axisTicks: {
                                show: false
                            },
                            labels: {
                                style: {
                                    colors: labelColor,
                                    fontSize: '12px'
                                }
                            },
                            crosshairs: {
                                position: 'front',
                                stroke: {
                                    color: baseColor,
                                    width: 1,
                                    dashArray: 3
                                }
                            },
                            tooltip: {
                                enabled: true,
                                formatter: undefined,
                                offsetY: 0,
                                style: {
                                    fontSize: '12px'
                                }
                            }
                        },
                        yaxis: {
                            labels: {
                                style: {
                                    colors: labelColor,
                                    fontSize: '12px'
                                }
                            }
                        },
                        states: {
                            normal: {
                                filter: {
                                    type: 'none',
                                    value: 0
                                }
                            },
                            hover: {
                                filter: {
                                    type: 'none',
                                    value: 0
                                }
                            },
                            active: {
                                allowMultipleDataPointsSelection: false,
                                filter: {
                                    type: 'none',
                                    value: 0
                                }
                            }
                        },
                        tooltip: {
                            style: {
                                fontSize: '12px'
                            },
                            y: {
                                formatter: function (val) {
                                    return {{ $prefix }} + val + " {{ $description }}{{ $suffix }}"
                                }
                            }
                        },
                        colors: [lightColor],
                        grid: {
                            borderColor: borderColor,
                            strokeDashArray: 4,
                            yaxis: {
                                lines: {
                                    show: true
                                }
                            }
                        },
                        markers: {
                            strokeColor: baseColor,
                            strokeWidth: 3
                        }
                    };

                    chart.self = new ApexCharts(element, options);
                    chart.self.render();
                    chart.rendered = true;
                }

                // Init chart
                initChart_{{ $id }}();

                // Update chart on theme mode change
                KTThemeMode.on("kt.thememode.change", function() {
                    if (chart.rendered) {
                        chart.self.destroy();
                    }

                    initChart_{{ $id }}();
                });
            }

            // Public methods
            return {
                init: function () {
                    initChartsWidget_{{ $id }}();
                }
            }
        }();

        // Webpack support
        if (typeof module !== 'undefined' && typeof module.exports !== 'undefined') {
            module.exports = KTWidgets_{{ $id }};
        }

        // On document ready
        KTUtil.onDOMContentLoaded(function() {
            KTWidgets_{{ $id }}.init();
        });
    </script>
@endpush
