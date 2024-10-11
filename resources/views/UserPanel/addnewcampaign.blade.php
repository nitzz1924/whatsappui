{{-- #---------------------------------------------------🙏🔱देवा श्री गणेशा 🔱🙏---------------------------” --}}
@extends('layouts.UserPanelLayouts.usermain')
@push('title')
    <title>Add New Campaign</title>
@endpush
@section('content')
    <div class="container-fluid">
        <form method="POST" action="{{ route('send-message') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <div class="card rounded-4">
                        <div class="card-header rounded-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="px-2">
                                    <h4 class="mb-sm-0">Add New Campaign</h4>
                                </div>
                                <div class="d-flex justify-content-end ">
                                    <div class="px-2">
                                        <button type="submit" class="btn text-white rounded-4 waves-effect waves-light"
                                            style="background-color: #054c44"><i class="bx bx-send me-2"></i>Send & Set
                                            Live</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="card rounded-4" style="border: 1px solid #054c44;">
                        <div class="card-body rounded-4 p-4">
                            <div class="mb-3">
                                <label for="username" class="form-label fs-5">Campaign Name</label>
                                <input type="text" name="campaignname" class="form-control rounded-4 py-2" id="username"
                                    placeholder="Enter Campaign Name" required>
                            </div>
                            <div>
                                <label for="autoCompleteFruit" class="form-label fs-5">Choose a Module</label>
                                <select name="modulename" class="form-select rounded-4 py-2 mb-3" aria-label="Default select example">
                                    <option selected>--select module--</option>
                                    @foreach ($groupdata as $data)
                                        <option value="{{ $data->label }}">{{ $data->label }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="rsegment" class="form-label fs-5">Recipients Segment</label>
                                <select  name="segmentname" class="form-select rounded-4 py-2 mb-3" aria-label="Default select example">
                                    <option selected>--select segment--</option>
                                    @foreach ($statusdata as $data)
                                        <option value="{{ $data->label }}">{{ $data->label }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="template" class="form-label fs-5">Choose Template</label>
                                <select class="form-select rounded-pill mb-3 onchangedrop" name="template"
                                    aria-label="Select template">
                                    <option disabled selected>--choose template--</option>
                                    @foreach ($alltemplates as $data)
                                        <option value="{{ $data['name'] }}"
                                            data-value="{{ htmlspecialchars(json_encode($data['components']), ENT_QUOTES, 'UTF-8') }}"
                                            data-language="{{ htmlspecialchars(json_encode($data['language']), ENT_QUOTES, 'UTF-8') }}"
                                            {{ old('template') == $data['name'] ? 'selected' : '' }}>
                                            {{ $data['name'] }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mt-4" id="previewdivtemplate">
                                 {{--Template Div Appends Here--}}
                            </div>
                            <label for="username" class="form-label fs-5">Schedule Your Campaign</label>
                            <div class="mb-0 mt-3">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input immeditate" type="radio" name="sendimmediate"
                                        id="inlineRadio1" value="0">
                                    <label class="form-check-label" for="inlineRadio1">Send Immediately</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input scheduledatetimebtn" type="radio"
                                        name="scheduledatetime" id="inlineRadio2" value="1">
                                    <label class="form-check-label" for="inlineRadio2">Schedule Date/Time</label>
                                </div>
                                <div class="d-none" id="datediv">
                                    <input type="datetime-local" name="datetime" class="form-control rounded-4 py-2"
                                        id="datetimeInput" placeholder="Enter Date and Time">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="whatsapp-container" id="messagediv">
                        {{--Message Div Appends Here--}}
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.scheduledatetimebtn').on('click', function() {
                const $datediv = $('#datediv');
                if ($datediv.hasClass('d-none')) {
                    $datediv.removeClass('d-none');
                } else {
                    $datediv.addClass('d-none');
                }
            });


            $('.immeditate').on('click', function() {
                const $datediv = $('#datediv');
                if ($datediv.hasClass('d-none')) {
                    $datediv.addClass('d-none');
                } else {
                    $datediv.addClass('d-none');
                }
            });
        });

        //Showing Message Dynamically
        $('.onchangedrop').on('change', function() {
            const selectedOption = $(this).find('option:selected');
            const data = selectedOption.data('value');
            const language = selectedOption.data('language').replace(/&quot;/g, '').trim();
            const decodedData = $('<textarea/>').html(data).text();
            const jsonArray = JSON.parse(decodedData);
            $('#messagediv').empty();
            $('#previewdivtemplate').empty();
            let messageHTML = '';

            jsonArray.forEach((element) => {
                //Dyamic Upload Input
                if (element.format == 'IMAGE' || element.format == 'VIDEO') {
                    const input = `
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Upload ${element.format == 'IMAGE' ? 'Image' : 'Video'}</label>
                        <input name="mediaimage" class="form-control" accept="image/*, video/*" onchange="readURL(this);" type="file" id="formFile">
                        <input type="hidden" name="mediatype" class="form-control" value=${element.format == 'IMAGE' ? 'image' : 'video'}>
                        <input type="hidden" name="languagetype" class="form-control" value=${language}>
                    </div>
                    `;
                    $('#previewdivtemplate').append(input);
                }
                if (element.type === 'HEADER') {
                    if (element.format == 'TEXT') {
                        messageHTML += `<p class="message-title">${element.text}</p>`;
                    } else if (element.format === 'VIDEO') {
                        messageHTML += `
                        <video controls width="100%" height="200px">
                            <source id="videomain" src="${element.videoUrl}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>`;
                    } else if (element.format === 'IMAGE') {
                        messageHTML +=
                            `
                        <img id="imagemain" src="${element.imageUrl}" height="200px" alt="${element.text}" width="100%">`;
                    }
                } else if (element.type === 'BODY') {
                    messageHTML += `<p class="message-body">${element.text}</p>`;
                } else if (element.type === 'FOOTER') {
                    messageHTML += `<p class="message-footer">${element.text}</p>`;
                } else if (element.type === 'BUTTONS') {
                    element.buttons.forEach(button => {
                        console.log(button);
                        messageHTML += `<p class="message-footer">${button.text}</p>`;
                    });
                }
            });
            const messageWithStrongTags = messageHTML.replace(/\*(.*?)\*/g, '<strong>$1</strong>');
            const linkRegex = /(https?:\/\/[^\s]+)/g;
            const formattedMessage = messageWithStrongTags.replace(linkRegex,
                '<a href="$1" target="_blank">$1</a>');

            const messagediv =
                `<div class="message-preview">
                 ${formattedMessage}
            </div>`;
            $('#messagediv').html(messagediv);
        });

        //Showing Image Preview
        function readURL(input) {
            console.log(input);
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagemain').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
