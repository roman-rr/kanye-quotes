@props([
    'count' => 0,
    'title' => '',
    'id' => '',
    'items' => [],
    'split' => false
])

<!--begin::Wrapper-->
<div class="d-flex flex-wrap">
    <!--begin::Chart-->
    <div class="position-relative d-flex flex-center h-175px {{ ($split) ? 'w-50':'w-100 mb-6' }}">
        <div class="position-absolute translate-middle start-50 top-50 d-flex flex-column flex-center">
            <span class="fs-2qx text-gray-800 fw-bold">{{ $count }}</span>
            <span class="fs-6 text-gray-600 fw-semibold text-gray-400">{{ $title }}</span>
        </div>
        <canvas id="{{ $id }}"></canvas>
    </div>
    <!--end::Chart-->

    <!--begin::Labels-->
    <div class="d-flex flex-column justify-content-center flex-row-fluid">
        @foreach($items as $key => $value)
            <!--begin::Label-->
            <div class="d-flex fs-6 fw-semibold align-items-center {{ (!$loop->last) ? 'mb-3':'' }}">
                <div class="bullet bg-{{ $value['class'] }} me-3"></div>
                <div class="text-gray-800">{{ $value['status'] }}</div>
                <div class="ms-auto fw-bold text-gray-900">{{ $value['count'] }}</div>
            </div>
            <!--end::Label-->
        @endforeach
    </div>
    <!--end::Labels-->
</div>
<!--end::Wrapper-->
@push('custom_scripts')
    <!--begin::Custom Javascript(used by this circle graph)-->
    <script>
        "use strict";
        var KTProjectOverview = function() {

            var item_class = [];
            var item_data = [];
            var item_label = [];

            @foreach($items as $key => $value)
                item_class.push(KTUtil.getCssVariableValue("--kt-{{ $value['class'] }}"));
                item_data.push({{$value['count']}});
                item_label.push('{{$value['status']}}');
            @endforeach

                return {
                init: function() {
                    var s,
                        i;
                    !function() {
                        var t = document.getElementById("submission_overview_chart");
                        if (t) {
                            var e = t.getContext("2d");
                            new Chart(e, {
                                type: "doughnut",
                                data: {
                                    datasets: [{
                                        data: item_data,
                                        backgroundColor: item_class
                                    }],
                                    labels: item_label
                                },
                                options: {
                                    chart: {
                                        fontFamily: "inherit"
                                    },
                                    cutoutPercentage: 75,
                                    responsive: !0,
                                    maintainAspectRatio: !1,
                                    cutout: "75%",
                                    title: {
                                        display: !1
                                    },
                                    animation: {
                                        animateScale: !0,
                                        animateRotate: !0
                                    },
                                    tooltips: {
                                        enabled: !0,
                                        intersect: !1,
                                        mode: "nearest",
                                        bodySpacing: 5,
                                        yPadding: 10,
                                        xPadding: 10,
                                        caretPadding: 0,
                                        displayColors: !1,
                                        backgroundColor: "#20D489",
                                        titleFontColor: "#ffffff",
                                        cornerRadius: 4,
                                        footerSpacing: 0,
                                        titleSpacing: 0
                                    },
                                    plugins: {
                                        legend: {
                                            display: !1
                                        }
                                    }
                                }
                            })
                        }
                    }()
                }
            }
        }();
        KTUtil.onDOMContentLoaded((function() {
            KTProjectOverview.init()
        }));
    </script>
    <!--end::Custom Javascript(used by this circle graph)-->
@endpush
