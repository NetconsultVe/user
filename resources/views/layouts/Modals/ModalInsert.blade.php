<div id="ModalInsert" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <i align="right">{{ $_ENV['APP_NAME'] }}</i>
            </div>
            <div class="modal-body">
                @yield('contentModalInsert')
            </div>
            <div class="modal-footer">
                @yield('footerModalInsert')
            </div>
        </div>
    </div>
</div>