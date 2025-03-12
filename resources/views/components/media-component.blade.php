<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <form action="#" class="" id="mediaGalleryForm" enctype="multipart/form-data">
                @csrf
                <div class="card rounded-4">
                    <div class="card-header rounded-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="px-2">
                                <h4 class="mb-sm-0">All Media</h4>
                            </div>
                            <div class="d-flex justify-content-end ">
                                <div class="px-2">
                                    <input type="file" id="fileidinput" class="btn text-white rounded-4 waves-effect waves-light" style="background-color: #054c44" multiple>
                                </div>
                                <button type="button" id="submitAllForms" class="btn text-white rounded-4 waves-effect waves-light"
                                    style="background-color: #054c44"><i class="bi bi-upload"></i>&nbsp;&nbsp;Upload</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-9">
            <div class="card rounded-4">
                <div class="card-body rounded-4">
                    <div class="row g-3" id="mediaGallery">

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card rounded-4">
                <div class="card-body rounded-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="card-title">Image Information</h5>
                    </div>
                    <div class="row gy-4">
                        <div class="col-md-12">
                            <div class="" id="imagePreview">
                                <img class="img-fluid" src="{{asset('assets/images/placeholder.png')}}" alt="">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="input-group">
                                <input type="text" placeholder="path of image" name="imageUrl" class="form-control" required>
                                <button class="btn text-white" type="button" onclick="copyToClipboard(event)" style="background-color: #054c44">
                                    <i class="bi bi-copy"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    document.querySelector("#submitAllForms").addEventListener("click", function(event) {
        event.preventDefault();
        const fileInput = document.querySelector("#fileidinput");
        if (fileInput.files.length === 0) {
            Swal.fire({
            title: "Error!",
            text: "Hum Developer esse hii hain ? Jab Input de rakha hai to file select to karo....",
            icon: "error",
            confirmButtonColor: "#116464",
            cancelButtonColor: "#d33",
            confirmButtonText: "karo jaakar",
            buttonsStyling: true,
            showCancelButton: true,
            showCloseButton: true
            });
            return;
        }
        const combinedFormData = new FormData();
        const forms = document.querySelectorAll("form");

        forms.forEach(form => {
            const formData = new FormData(form);
            for (let [key, value] of formData.entries()) {
                combinedFormData.append(key, value);
            }
        });

        // Get mediaGalleryForm instances
        const mediaGalleryForm = document.querySelector("#mediaGalleryForm input[type='file']");
        Array.from(mediaGalleryForm.files).forEach((file) => {
            if (file) {
                combinedFormData.append("mediaImages[]", file);
            }
        });

        // Log all form values to the console
        for (let [key, value] of combinedFormData.entries()) {
            console.log(key, value);
        }

        // Submit the form data via AJAX (Move it inside the event listener)
        $.ajax({
            url: '/insertMedia'
            , method: 'POST'
            , data: combinedFormData
            , processData: false
            , contentType: false
            , headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
            , success: function(data) {
                console.log("%cRaw response:", "background: black; color: purple; font-size: 14px;", data);
                if (data.message) {
                    Swal.fire({
                        title: "Success!"
                        , text: data.message
                        , icon: "success"
                        , confirmButtonText: "OK"
                        , customClass: {
                            confirmButton: "btn btn-primary w-xs me-2 mt-2"
                        }
                        , buttonsStyling: true
                        , showCancelButton: true
                        , showCloseButton: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            if (data.images && data.images.length > 0) {
                                let gallery = document.querySelector("#mediaGallery");
                                data.images.forEach(imgUrl => {
                                    let imgContainer = document.createElement("div");
                                    imgContainer.classList.add("col-2", "position-relative","overflow-hidden","rounded-4","m-2");
                                    imgContainer.style.border = "1px solid #054c44";

                                    let imgElement = document.createElement("img");
                                    imgElement.src = imgUrl;
                                    imgElement.classList.add("gallery-card", "img-fluid","object-fit-contain","h-100","w-100");

                                    let closeButton = document.createElement("button");
                                    closeButton.classList.add("btn", "btn-danger", "pe-2", "ps-2", "rounded", "text-black");
                                    closeButton.style.position = "absolute";
                                    closeButton.style.top = "-2";
                                    closeButton.style.right = "0px";
                                    closeButton.setAttribute("aria-label", "Close");
                                    closeButton.innerHTML = "X";


                                    imgContainer.appendChild(imgElement);
                                    imgContainer.appendChild(closeButton);
                                    gallery.appendChild(imgContainer);
                                });
                            }
                        }
                    });
                }
            }

        });
    });

    //Getting Gallery Images here............
    $(document).ready(function() {
        $.ajax({
            url: "/showMediaGallery",
            method: "GET" ,
            success: function(response) {
                console.log(response);
                let gallery = $("#mediaGallery");
                gallery.empty(); // Clear existing images
                if (response.storedImages && response.storedImages.length > 0) {
                    response.storedImages.forEach(mediaUrl => {
                        let mediaContainer = `<div class="col-2 m-2 position-relative rounded-4 overflow-hidden" style="border: 1px solid #054c44;">`;
                        if (mediaUrl.match(/\.(jpeg|jpg|gif|png)$/) != null) {
                            mediaContainer += `<img src="${mediaUrl}" data-url="${mediaUrl}" onclick="GetPath(event);" class="gallery-card img-fluid object-fit-contain h-100 w-100" alt="Media Image">`;
                        } else if (mediaUrl.match(/\.(mp4|avi|mov)$/) != null) {
                            mediaContainer += `<video  data-url="${mediaUrl}" onclick="GetPath(event);" class="gallery-card img-fluid object-fit-contain h-100 w-100">
                                                    <source src="${mediaUrl}" type="video/mp4">
                                                    Your browser does not support the video tag.
                                                </video>`;
                        }
                        mediaContainer += `<button onclick="RemoveGalleryItem('${mediaUrl}');" class="btn btn-danger pe-2 ps-2 rounded text-black" style="position: absolute; top: -2; right: 0px;" aria-label="Close">X</button>
                                            </div>`;
                        gallery.append(mediaContainer);
                    });
                } else {
                    gallery.append('<div class="col-12 text-center text-muted">No media found</div>');
                }
            },
            error: function(error) {
                console.error("Error fetching images:", error);
            }
        });
    });

    //Getting path of Image url and show it in div
    function GetPath(event) {
        var imgUrl = event.target.getAttribute('data-url').split('/').pop();
        document.querySelector('input[name="imageUrl"]').value = imgUrl;
        const imagePreview = document.getElementById('imagePreview');
        if (imgUrl.match(/\.(jpeg|jpg|gif|png)$/) != null) {
            imagePreview.innerHTML = `<img class="img-fluid" src="{{ asset('assets/images/Media') }}/` + imgUrl + `" alt="">`;
        }
        else if (imgUrl.match(/\.(mp4|avi|mov)$/) != null) {
            imagePreview.innerHTML = `
                <video class="img-fluid" controls>
                    <source src="{{ asset('assets/images/Media') }}/` + imgUrl + `" type="video/mp4">
                    Your browser does not support the video tag.
                </video>`;
        }
    }


    //Copy URL to clipboard
    function copyToClipboard(event) {
        event.preventDefault();
        const imgUrl = document.querySelector('input[name="imageUrl"]').value;
        const currentUrl = imgUrl;
        navigator.clipboard.writeText(currentUrl)
            .then(() => {
                const toastHTML = `
                        <div class="toast position-fixed top-0 end-0 p-1 align-items-center text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true" style="z-index: 1050;">
                        <div class="toast-body">
                                URL copied to clipboard
                            </div>
                        </div>
                        `;

                const toastContainer = document.createElement('div');
                toastContainer.innerHTML = toastHTML;
                document.body.appendChild(toastContainer);

                const toastElement = new bootstrap.Toast(toastContainer.querySelector('.toast'), {
                    delay: 3000
                });
                toastElement.show();
            })
            .catch(err => {
                console.error("Failed to copy URL: ", err);
            });
    }

    function RemoveGalleryItem(url) {
        const Deleteurl = url;
        $.ajax({
            url: "/removegalleryitem"
            , method: "GET"
            , data: {
                url: Deleteurl
            }
            , success: function() {
                console.log('deleted');
                $(`img[data-url="${url}"]`).closest('.col-2').remove();
            }
        });
    }

</script>