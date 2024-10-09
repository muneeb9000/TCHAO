<!-- Footer Section -->
<footer class="footer mt-auto py-3 bg-white text-center">
    <div class="container">
        <span class="text-muted"> 
            Copyright © <span id="year"></span> 
            <a href="javascript:void(0);" class="text-dark fw-semibold">TCHAO TCHAO</a>.
            Developed with 
            <span class="bi bi-heart-fill text-danger"></span> 
            by 
            <a href="javascript:void(0);">
                <span class="fw-semibold text-primary text-decoration-underline">TECHSOPS PRIVATE LIMITED</span>
            </a> 
            All rights reserved.
        </span>
    </div>
</footer>



<!-- Scroll to Top Button -->
<div class="scrollToTop">
    <span class="arrow">
        <i class="ri-arrow-up-s-fill fs-20"></i>
    </span>
</div>

<!-- Responsive Overlay -->
<div id="responsive-overlay"></div>

<!-- JS Libraries -->
<script src="{{ asset('admin/assets/libs/@popperjs/core/umd/popper.min.js') }}"></script>
<script src="{{ asset('admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/defaultmenu.min.js') }}"></script>
<script src="{{ asset('admin/assets/libs/node-waves/waves.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/sticky.js') }}"></script>
<script src="{{ asset('admin/assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/simplebar.js') }}"></script>
<script src="{{ asset('admin/assets/libs/@simonwep/pickr/pickr.es5.min.js') }}"></script>
<script src="{{ asset('admin/assets/libs/jsvectormap/js/jsvectormap.min.js') }}"></script>
<script src="{{ asset('admin/assets/libs/jsvectormap/maps/world-merc.js') }}"></script>
<script src="{{ asset('admin/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('admin/assets/libs/chart.js/chart.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/crm-dashboard.js') }}"></script>
<script src="{{ asset('admin/assets/js/custom-switcher.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/custom.js') }}"></script>



<!-- Custom Script to Set the Current Year -->
<script>
    document.getElementById('year').textContent = new Date().getFullYear();
</script>
