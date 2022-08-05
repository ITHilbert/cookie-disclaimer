<template>
<div id="cookies-infos" class="modal" tabindex="-2" role="dialog">
    <div class="modal-dialog modal-xl" role="document" >
    <div class="modal-content" >
        <div class="modal-header">
        <h4 class="modal-title">Cookies</h4>
        </div>
        <div class="modal-body" >
            <div class="container">
                <div class="cookie-infos">

                </div>
            </div>
        </div>
        <div class="modal-footer">
            <div class="row w-100" >
                <div class="col-12 text-right">
                    <button type="button" class="btn btn-primary" @click="CookiesInfosClose()">Okay</button>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
</template>


<script>
    export default {
        methods: {
            CookiesInfosClose(){
                $('#cookies-infos').modal('hide');
                //$('#cookie-disclaimer').modal('show');
            }
        },
        mounted(){
            //###############################################
            //# Events
            //###############################################

            $(document).ready(function() {
                loadInfos();
            });

            $("#cookies-infos").on("hidden.bs.modal", function () {
                $('#cookie-disclaimer').modal('show');
            });

            //###############################################
            //# Ajax
            //###############################################

            /**
             * CSRF-Token setzen, sonst funktioniert Ajax nicht
             */
            /* $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            }); */

            /**
             * Speichern was der User im Cookie-Disclaimer gedrückt hat
             *
             * @param {bool} allow  => true or false
             */
            function loadInfos() {
                //alert($('meta[name="csrf-token"]').attr('content'));

                $.ajax({
                    type: "POST",
                    url: window.location.origin + "/api/load-cookie-infos",
                    cache: false,
                    data: "",
                    dataType: "json",
                    success: function(response) {
                        if (response.status == "Okay") {
                            //$('#info-' + response.AUID).attr('info', response.msg);
                            $('.cookie-infos').append(response.info);
                        } else {
                            alert(response.msg);
                        }
                    }
                });
            };
        }
    }
</script>

<style scoped>
.modal-dialog,
.modal-content {
    /* 80% of window height */
    height: 95%;
}

.modal-body {
    /* 100% = dialog height, 120px = header + footer */
    max-height: calc(100% - 120px);
    overflow-y: scroll;
}
</style>
