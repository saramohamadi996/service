
<script type="text/javascript">
    function deleteFile(id) {
        jQuery(document).ready(function () {
            if (id) {
                jQuery.ajax({
                    url: "{{route('categories.deleteFile')}}",
                    data: {
                        'id': id,
                    },
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('#delete').html('');
                    }
                });
            }
        });
    }
</script>
