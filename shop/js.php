<script src="<?php echo $pn; ?>/admin/assets/js/adminlte.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/browser/overlayscrollbars.browser.es6.min.js"
    integrity="sha256-H2VM7BKda+v2Z4+DRy69uknwxjyDRhszjXFhsL4gD3w=" crossorigin="anonymous"></script>
<!--end::Third Party Plugin(OverlayScrollbars)-->
<!--begin::Required Plugin(popperjs for Bootstrap 5)-->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha256-whL0tQWoY1Ku1iskqPFvmZ+CHsvmRWx/PIoEvIeWh4I=" crossorigin="anonymous"></script>
<!--end::Required Plugin(popperjs for Bootstrap 5)-->
<!--begin::Required Plugin(Bootstrap 5)-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha256-YMa+wAM6QkVyz999odX7lPRxkoYAan8suedu4k2Zur8=" crossorigin="anonymous"></script>
<!--end::Required Plugin(Bootstrap 5)-->
<!--begin::Required Plugin(AdminLTE)-->

<script src="https://cdn.datatables.net/2.1.4/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.1.4/js/dataTables.bootstrap5.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/d3js/7.9.0/d3.min.js"></script>
<script>
new DataTable('#example');
</script>
<script>
    
const SELECTOR_SIDEBAR_WRAPPER = ".sidebar-wrapper";
const Default = {
    scrollbarTheme: "os-theme-light",
    scrollbarAutoHide: "leave",
    scrollbarClickScroll: true,
};
document.addEventListener("DOMContentLoaded", function() {
    const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
    if (
        sidebarWrapper &&
        typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== "undefined"
    ) {
        OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
            scrollbars: {
                theme: Default.scrollbarTheme,
                autoHide: Default.scrollbarAutoHide,
                clickScroll: Default.scrollbarClickScroll,
            },
        });
    }
});
</script>
<!--end::OverlayScrollbars Configure-->
<!-- OPTIONAL SCRIPTS -->
<!-- sortablejs -->
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"
    integrity="sha256-ipiJrswvAR4VAx/th+6zWsdeYmVae0iJuiR+6OqHJHQ=" crossorigin="anonymous"></script>
<!-- sortablejs -->
<script>
const connectedSortables =
    document.querySelectorAll(".connectedSortable");
connectedSortables.forEach((connectedSortable) => {
    let sortable = new Sortable(connectedSortable, {
        group: "shared",
        handle: ".card-header",
    });
});

const cardHeaders = document.querySelectorAll(
    ".connectedSortable .card-header",
);
cardHeaders.forEach((cardHeader) => {
    cardHeader.style.cursor = "move";
});
</script> <!-- apexcharts -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js"
    integrity="sha256-+vh8GkaU7C9/wbSLIcwq82tQ2wTf44aOHA8HlBMwRI8=" crossorigin="anonymous"></script> <!-- ChartJS -->
<script>
// NOTICE!! DO NOT USE ANY OF THIS JAVASCRIPT
// IT'S ALL JUST JUNK FOR DEMO
// ++++++++++++++++++++++++++++++++++++++++++

const sales_chart_options = {
    series: [{
            name: "Digital Goods",
            data: [28, 48, 40, 19, 86, 27, 90],
        },
        {
            name: "Electronics",
            data: [65, 59, 80, 81, 56, 55, 40],
        },
    ],
    chart: {
        height: 300,
        type: "area",
        toolbar: {
            show: false,
        },
    },
    legend: {
        show: false,
    },
    colors: ["#0d6efd", "#20c997"],
    dataLabels: {
        enabled: false,
    },
    stroke: {
        curve: "smooth",
    },
    xaxis: {
        type: "datetime",
        categories: [
            "2023-01-01",
            "2023-02-01",
            "2023-03-01",
            "2023-04-01",
            "2023-05-01",
            "2023-06-01",
            "2023-07-01",
        ],
    },
    tooltip: {
        x: {
            format: "MMMM yyyy",
        },
    },
};

const sales_chart = new ApexCharts(
    document.querySelector("#revenue-chart"),
    sales_chart_options,
);
sales_chart.render();
</script> <!-- jsvectormap -->
<script src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/js/jsvectormap.min.js"
    integrity="sha256-/t1nN2956BT869E6H4V1dnt0X5pAQHPytli+1nTZm2Y=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/maps/world.js"
    integrity="sha256-XPpPaZlU8S/HWf7FZLAncLg2SAkP8ScUTII89x9D3lY=" crossorigin="anonymous"></script>
<!-- jsvectormap -->
<script>
const visitorsData = {
    US: 398, // USA
    SA: 400, // Saudi Arabia
    CA: 1000, // Canada
    DE: 500, // Germany
    FR: 760, // France
    CN: 300, // China
    AU: 700, // Australia
    BR: 600, // Brazil
    IN: 800, // India
    GB: 320, // Great Britain
    RU: 3000, // Russia
};

// World map by jsVectorMap
const map = new jsVectorMap({
    selector: "#world-map",
    map: "world",
});

// Sparkline charts
const option_sparkline1 = {
    series: [{
        data: [1000, 1200, 920, 927, 931, 1027, 819, 930, 1021],
    }, ],
    chart: {
        type: "area",
        height: 50,
        sparkline: {
            enabled: true,
        },
    },
    stroke: {
        curve: "straight",
    },
    fill: {
        opacity: 0.3,
    },
    yaxis: {
        min: 0,
    },
    colors: ["#DCE6EC"],
};

const sparkline1 = new ApexCharts(
    document.querySelector("#sparkline-1"),
    option_sparkline1,
);
sparkline1.render();

const option_sparkline2 = {
    series: [{
        data: [515, 519, 520, 522, 652, 810, 370, 627, 319, 630, 921],
    }, ],
    chart: {
        type: "area",
        height: 50,
        sparkline: {
            enabled: true,
        },
    },
    stroke: {
        curve: "straight",
    },
    fill: {
        opacity: 0.3,
    },
    yaxis: {
        min: 0,
    },
    colors: ["#DCE6EC"],
};

const sparkline2 = new ApexCharts(
    document.querySelector("#sparkline-2"),
    option_sparkline2,
);
sparkline2.render();

const option_sparkline3 = {
    series: [{
        data: [15, 19, 20, 22, 33, 27, 31, 27, 19, 30, 21],
    }, ],
    chart: {
        type: "area",
        height: 50,
        sparkline: {
            enabled: true,
        },
    },
    stroke: {
        curve: "straight",
    },
    fill: {
        opacity: 0.3,
    },
    yaxis: {
        min: 0,
    },
    colors: ["#DCE6EC"],
};

const sparkline3 = new ApexCharts(
    document.querySelector("#sparkline-3"),
    option_sparkline3,
);
sparkline3.render();
$(document).ready(function () {
    $(document).on('click', '#checkAll', function () {
        $(".itemRow").prop("checked", this.checked);
    });
    $(document).on('click', '.itemRow', function () {
        if ($('.itemRow:checked').length == $('.itemRow').length) {
            $('#checkAll').prop('checked', true);
        } else {
            $('#checkAll').prop('checked', false);
        }
    });
    var count = $(".itemRow").length;
    $(document).on('click', '#addRows', function () {
        count++;
        var htmlRows = '';
        htmlRows += '<tr>';
        htmlRows += '<td><div class="custom-control custom-checkbox"> <input type="checkbox" class="custom-control-input itemRow" id="itemRow_' + count + '"> <label class="custom-control-label" for="itemRow_' + count + '"></label> </div></td>';
        htmlRows += '<td><input type="text" name="productCode[]" id="productCode_' + count + '" class="form-control" autocomplete="off"></td>';
        htmlRows += '<td><input type="text" name="productName[]" id="productName_' + count + '" class="form-control" autocomplete="off"></td>';
        htmlRows += '<td><input type="number" name="quantity[]" id="quantity_' + count + '" class="form-control quantity" autocomplete="off"></td>';
        htmlRows += '<td><input type="number" name="price[]" id="price_' + count + '" class="form-control price" autocomplete="off"></td>';
        htmlRows += '<td><input type="number" name="total[]" id="total_' + count + '" class="form-control total" autocomplete="off"></td>';
        htmlRows += '</tr>';
        $('#invoiceItem').append(htmlRows);
    });
    $(document).on('click', '#removeRows', function () {
        $(".itemRow:checked").each(function () {
            $(this).closest('tr').remove();
        });
        $('#checkAll').prop('checked', false);
        calculateTotal();
    });
    $(document).on('blur', "[id^=quantity_]", function () {
        calculateTotal();
    });
    $(document).on('blur', "[id^=price_]", function () {
        calculateTotal();
    });
    $(document).on('blur', "#taxRate", function () {
        calculateTotal();
    });
    $(document).on('blur', "#amountPaid", function () {
        var amountPaid = $(this).val();
        var totalAftertax = $('#totalAftertax').val();
        if (amountPaid && totalAftertax) {
            totalAftertax = totalAftertax - amountPaid;
            $('#amountDue').val(totalAftertax);
        } else {
            $('#amountDue').val(totalAftertax);
        }
    });
    $(document).on('click', '.deleteInvoice', function () {
        var id = $(this).attr("id");
        if (confirm("Are you sure you want to remove this?")) {
            $.ajax({
                url: "action.php",
                method: "POST",
                dataType: "json",
                data: { id: id, action: 'delete_invoice' },
                success: function (response) {
                    if (response.status == 1) {
                        $('#' + id).closest("tr").remove();
                    }
                }
            });
        } else {
            return false;
        }
    });
});
function calculateTotal() {
    var totalAmount = 0;
    $("[id^='price_']").each(function () {
        var id = $(this).attr('id');
        id = id.replace("price_", '');
        var price = $('#price_' + id).val();
        var quantity = $('#quantity_' + id).val();
        if (!quantity) {
            quantity = 1;
        }
        var total = price * quantity;
        $('#total_' + id).val(parseFloat(total));
        totalAmount += total;
    });
    $('#subTotal').val(parseFloat(totalAmount));
    var taxRate = $("#taxRate").val();
    var subTotal = $('#subTotal').val();
    if (subTotal) {
        var taxAmount = subTotal * taxRate / 100;
        $('#taxAmount').val(taxAmount);
        subTotal = parseFloat(subTotal) + parseFloat(taxAmount);
        $('#totalAftertax').val(subTotal);
        var amountPaid = $('#amountPaid').val();
        var totalAftertax = $('#totalAftertax').val();
        if (amountPaid && totalAftertax) {
            totalAftertax = totalAftertax - amountPaid;
            $('#amountDue').val(totalAftertax);
        } else {
            $('#amountDue').val(subTotal);
        }
    }
}
</script>
<!--end::Script-->
