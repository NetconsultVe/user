<div id="ModalInsertFamilia" >
    <div class="modal-dialog">
        <div class="panel-content">
            <div class="panel-header">
                <i align="right">{{ $_ENV['APP_NAME'] }}</i>
            </div>
            <div class="panel-body">
                @yield('contentModalInsert')
            </div>
            <div class="panel-footer">
                @yield('footerModalInsert')
            </div>
        </div>
    </div>
</div>