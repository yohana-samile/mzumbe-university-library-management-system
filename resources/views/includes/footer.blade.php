
                    <footer class="sticky-footer bg-light">
                        <div class="container my-auto">
                            <div class="copyright text-center my-auto">
                                <span>Developed By <a href="https://github.com/yohana-samile" target="_blank">Developer Samile</a></span>
                            </div>
                        </div>
                    </footer>
                    <!-- End of Footer -->

                    </div>
                    <!-- End of Content Wrapper -->

                </div>
                <!-- End of Page Wrapper -->

                <!-- Scroll to Top Button-->
                <a class="scroll-to-top rounded" href="#page-top">
                    <i class="fas fa-angle-up"></i>
                </a>

                <!-- Logout Modal-->
                <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
        <script src="{{ url("vendor/jquery/jquery.min.js")}}"></script>
        <script src="{{ url("vendor/bootstrap/js/bootstrap.bundle.min.js")}}"></script>

        <!-- Core plugin JavaScript-->
        <script src="{{ url("vendor/jquery-easing/jquery.easing.min.js")}}"></script>

        {{-- for pie chart --}}
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        {{-- jquery --}}
        <!-- Custom scripts for all pages-->
        <script src="{{ url("js/style.min.js")}}"></script>
        <script src="{{ url("js/custom.js")}}"></script>

        <!-- Page level plugins -->
        <script src="{{ url("vendor/datatables/jquery.dataTables.min.js")}}"></script>
        <script src="{{ url("vendor/datatables/dataTables.bootstrap4.min.js")}}"></script>

        <!-- Page level custom scripts -->
        <script src="{{ url("js/demo/datatables-demo.js")}}"></script>
    </body>
</html>
