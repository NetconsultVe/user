<div id="ModalUpdate" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <i align="right">{{ $_ENV['APP_NAME'] }}</i>
            </div>
            <div class="modal-body">
                @yield('contentModalUpdate')
            </div>
            <div class="modal-footer">
                @yield('footerModalUpdate')
            </div>
        </div>
    </div>
</div>