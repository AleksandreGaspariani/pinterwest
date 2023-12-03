<div class="">
    <form action="/image/store" method="post" enctype="multipart/form-data" class="d-flex justify-content-start px-3 mx-5">
        @csrf

        <div class="w-100 py-5 d-flex flex-row justify-content-start align-items-start">
            <div class="w-100 d-flex flex-row justify-content-evenly align-items-center">
                <div class="d-flex flex-column justify-content-start align-items-start">
{{--                    <label class="form-label" for="customFile">Upload your image here.</label>--}}
                    <input type="file" class="form-control" id="customFile" name="file" onchange="loadFile(event)"/>

{{--                    <label type="text" class="form-label mt-3" for="description">Description</label>--}}
                    <textarea type="textarea" class="form-control mt-1" name="description" id="description"></textarea>
                    <div class="mt-1">
                        <input type="submit" placeholder="Post" class="btn btn-outline-dark">
                    </div>
                </div>
                <div class="mx-5 rounded-4">
                    <img id="output" width="250px"/>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    };
</script>
