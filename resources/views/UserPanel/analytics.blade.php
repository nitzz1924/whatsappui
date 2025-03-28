
{{-- #---------------------------------------------------🙏🔱देवा श्री गणेशा 🔱🙏---------------------------” --}}
@extends('layouts.UserPanelLayouts.usermain')
@push('title')
    <title>Analytics</title>
@endpush
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <div class="card-header">
                <h5 class="card-title text-black">Today's Received Messages</h5>
            </div>
            <div class="card-body rounded-4">
                <div class="table-responsive">
                    <table class="table table-borderless table-nowrap table-hover">
                        <thead>
                            <tr>
                                <th style="background-color:#054c441e; border-radius: 10px 0 0 10px;"> S.No</th>
                                <th style="background-color:#054c441e;">Sender ID</th>
                                <th style="background-color:#054c441e;">Type</th>
                                <th style="background-color:#054c441e;">Message</th>
                                <th style="background-color:#054c441e;">Received On</th>
                            </tr>
                        </thead>
                        <tbody id="table-body">
                            @foreach($messages->take(10) as $key => $value)
                            @php
                                $msg = json_decode($value->message);
                            @endphp
                            <tr class="border-bottom-1">
                                <td>{{$key + 1}}</td>
                                <td>+{{$value->senderid}}</td>
                                <td>{{$value->type}}</td>
                                <td>
                                    @if(isset($msg->text->body))
                                        <button class="bg-transparent border-0" role="button" data-bs-toggle="popover"
                                            data-bs-trigger="focus" title=""
                                            data-bs-content="{{ trim($msg->text->body) }}">{{ Str::limit(trim($msg->text->body), 20, '...') }}</button>
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td>{{ $value->created_at->format('d/m/y') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection