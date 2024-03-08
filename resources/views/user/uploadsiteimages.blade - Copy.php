@extends('user.layouts.header')
@section('styles')
    <link rel="stylesheet" href="{{ URL::asset('assets/css/upload-image.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/dropify.min.css') }}">
@endsection
@section('content')

    <section>
      <div class="container">
        <div class="d-flex justify-content-start align-items-center flex-column min-vh-100">
            <div class="row w-100">
              <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="headText text-center  d-flex align-items-center"> 
                  <!-- back button -->
                  <div class="back-btn text-start mb-3"><a href="{{ route('user-dashboard')}}" class="text-decoration-none text-black"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                      <path d="M16.6665 9.375C16.8323 9.375 16.9912 9.44085 17.1084 9.55806C17.2257 9.67527 17.2915 9.83424 17.2915 10C17.2915 10.1658 17.2257 10.3247 17.1084 10.4419C16.9912 10.5592 16.8323 10.625 16.6665 10.625H8.95817V15C8.95806 15.1235 8.92135 15.2443 8.85266 15.3469C8.78398 15.4496 8.68641 15.5296 8.57227 15.5769C8.45814 15.6242 8.33256 15.6365 8.21139 15.6125C8.09022 15.5884 7.97891 15.529 7.8915 15.4417L2.8915 10.4417C2.77446 10.3245 2.70872 10.1656 2.70872 10C2.70872 9.83437 2.77446 9.67552 2.8915 9.55833L7.8915 4.55833C7.97891 4.47104 8.09022 4.4116 8.21139 4.38753C8.33256 4.36346 8.45814 4.37583 8.57227 4.42309C8.68641 4.47035 8.78398 4.55038 8.85266 4.65306C8.92135 4.75574 8.95806 4.87647 8.95817 5V9.375H16.6665Z" fill="black"/>
                    </svg><span class="back-btn-text">Back</span></a>
                  </div>   
                  <h2 class="fw-semibold mx-auto mb-0">Upload Your Images</h2> 
                </div>
              </div>
            </div>

            <div class="row w-100">
              <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="selected-option w-100">
                  <span>{{$userSite->sitetype}} <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none">
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M13.7501 10.5001C13.7501 13.2218 8.5501 16.4343 7.5076 17.0501C7.11177 17.2851 6.60093 17.1534 6.36677 16.7576C6.13093 16.3609 6.26427 15.8501 6.65927 15.6168C8.84677 14.3209 12.0834 11.8001 12.0834 10.5001C12.0834 9.19844 8.84677 6.6776 6.65927 5.38344C6.26427 5.14927 6.13093 4.63677 6.36677 4.24261C6.6001 3.84677 7.11093 3.7151 7.5076 3.9501C8.5501 4.56594 13.7501 7.77844 13.7501 10.5001Z" fill="#333333"/>
                    </svg>{{$userSite->site}}  <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none" class="me-0">
                      <path opacity="0.16" d="M5.20829 16.6667L4.16663 20.8333L8.33329 19.7917L18.75 9.375L15.625 6.25L5.20829 16.6667Z" fill="#001F3F"/>
                      <path d="M15.625 6.25L18.75 9.375M13.5416 20.8333H21.875M5.20829 16.6667L4.16663 20.8333L8.33329 19.7917L20.402 7.72292C20.7926 7.33223 21.012 6.80243 21.012 6.25C21.012 5.69758 20.7926 5.16777 20.402 4.77708L20.2229 4.59792C19.8322 4.20735 19.3024 3.98795 18.75 3.98795C18.1975 3.98795 17.6677 4.20735 17.277 4.59792L5.20829 16.6667Z" stroke="#001F3F" stroke-width="2.08333" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg></span>
              </div>
              </div>
            </div>

            <div class="row w-100 ">
                <div class="col-sm-12 col-md-12 col-lg-6 d-flex flex-column custom-pd1">
                  <div class="upload-file-1">
                    @php  
                        $asset_type = array();
                        $max_size = array();
                        $max_no = array();
                        $min_no = array();
                        $file_formate = array();
                        $accept_file_formate = array();
                        $assettype_list = array();
                        

                        if ($SiteError) {
                            $totalno_list = count($SiteError);
                            foreach ($SiteError as $se) {
                                array_push($asset_type, $se->asset_type);
                                array_push($max_size, $se->max_size);
                                array_push($max_no, $se->max_no);
                                array_push($min_no, $se->min_no);

                                $formate_list_arr = explode(" ",$se->file_formate);
                             
                                array_push($file_formate, $formate_list_arr);
  
                                    foreach ($formate_list_arr as $ff) {
                                        array_push($accept_file_formate, $se->asset_type.'/'.$ff);
                                    }

     

                            }
                        }

                      
                        //==================  start ==================
                        // to get list of formate type like JPG,PNG,GIFJPG,PNG,GIF 

                        $string_formatelist = '';

                        foreach ($file_formate as $subarray) {
                            $string_formatelist .= implode(",", $subarray);
                        }

                        //====================  end  ================

                        
                        //==================   ==================
                        // to get list of formate type like image/JPG, image/PNG, image/GIF 
                        $accept_file_formate1 = array_unique($accept_file_formate);
                        $accept_file_formate_string = implode(", ",$accept_file_formate1);
                        //==================  end ==================

                        $accept_asset_type1 = array_unique($asset_type);


                        $accept_max_no1 = array_sum($max_no);
                       
                        $finial_max_count = '';


                        function bytesToKb($bytes) {
                            if ($bytes < 0) {
                                return 0;
                            } else {
                                return round($bytes / 1024, 2); // Convert bytes to kilobytes and round to 2 
                            }
                        }
                       
                        
                    @endphp

                    
                    


    
                    <form action="{{route('store-site-images')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                        <div class="form-group">
                            <input type="hidden" name="site_type" id="site_type" value="{{$userSite->sitetype}}">
                            <input type="hidden" name="usersite_id" id="usersite_id" value="{{$userSite->id}}">
                            <input type="hidden" name="unique_id" id="unique_id" value="{{$userSite->unique_id}}">

                            <input name="document[]" type="file" data-default-file="" class="dropify @error('document.*') is-invalid @enderror" id="imageUpload" data-height="100" accept="{{$accept_file_formate_string}}"  multiple required/>
                            @error('document.*')
                                <span style="color:red; display: block;" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            <p>
                            <!-- @foreach ($SiteError as $se) 
                                {{ $se->asset_type }} should not bigger than {{ $se->max_size }}KB
                            @endforeach -->
                            
                            @php
                                $errorData = array();
                                $previousAssetType = null;
                            @endphp

                            @foreach ($SiteError as $se)
                                @php
                                    $assetType = ucfirst($se->asset_type);
                                    $deviceType = ucfirst($se->device_type);
                                    $fileFormats = $se->file_formate; // Unique file formats
                                    $errorData[] = array(
                                        'assetType' => $assetType,
                                        'deviceType' => $deviceType,
                                        'maxSize' => $se->max_size,
                                        'maxNo' => $se->max_no, // Adding maximum number of files
                                        'minNo' => $se->min_no, // Adding minimum number of files
                                        'fileFormats' => $fileFormats
                                    );
                                @endphp

                               

                                @if ($se->asset_type == $previousAssetType)
                                    @if ($se->asset_type == $previousAssetType)
                                        <strong>{{ $deviceType }}</strong> <strong>{{ $assetType }}</strong> should not be bigger than {{ bytesToKb($se->max_size) }}KB
                                        <!-- <input type="text" name="file_formats[]" value="{{ $fileFormats }}"> -->
                                    @else
                                        <strong>{{ $assetType }}</strong> should not be bigger than {{ bytesToKb($se->max_size) }}KB
                                        <!-- <input type="text" name="file_formats[]" value="{{ $fileFormats }}"> -->
                                    @endif
                                @else
                                    <strong>{{ $assetType }}</strong> should not be bigger than {{ bytesToKb($se->max_size) }}KB
                                    <!-- <input type="text" name="file_formats[]" value="{{ $fileFormats }}"> -->
                                @endif

                                @php
                                    $previousAssetType = $se->asset_type;
                                @endphp
                            @endforeach

                            <input type="hidden" id="error-data" value="{{ json_encode($errorData) }}">

                           
                            <!-- Image should not bigger than 30MB & Video should not Bigger that 1GB</p> -->
                        </div>
                        <button type="submit" class="btn btn-primary submit-btn align-self-center fw-semibold my-4">Submit</button>
                    </form>
                  
                </div>

                @if(session('error'))
                    <div class="col-sm-12 col-md-12 col-lg-6 custom-pd2">
                        <div class="table-responsive">
                          <table class="table  text-center text-black fw-semibold spec-table rounded">
                            <thead>
                            <tr class="fs-5">
                                <th scope="col" class="text-nowrap">Image Name</th>
                                <th scope="col" class="text-nowrap">Asset Checklist</th>
                                <th scope="col">Uploaded</th>
                                <th scope="col">Error</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(session('error')['success_list'] as $success)
                            <tr>
                                <td>{{ $success }}</td>
                                <td>Done</td>
                                <td>Yes</td>
                                <td>-</td>
                            </tr>
                            @endforeach

                            @foreach(session('error')['error_list'] as $er)
                            <tr id="table-error">
                                <td>{{ $er['name'] }}</td>
                                <td>{{ $er['asset_err'] }}</td>
                                <td>No</td>
                                <td>{{ $er['error'] }}</td>
                            </tr>
                            @endforeach
                            </tbody>
                          </table>
                        </div>
                    </div>


                        
                    @endif

                
          </div>          
        </div>
      </div> 
  </section>

 
@endsection
@section('scripts')   

<script type="text/javascript" src="{{ URL::asset('assets/js/wooenglish_assets_js_dropify.min.js') }}"></script>
<script type="text/javascript">

  $('.dropify').dropify();
</script>

<script>
    // Wait for the DOM content to be fully loaded
    document.addEventListener('DOMContentLoaded', function() {
        // Get the elements with the class name 'success_alert'
        var success_alerts = document.getElementsByClassName('success_alert');

        // Loop through each element with the class name 'success_alert'
        for (var i = 0; i < success_alerts.length; i++) {
            var success_alert = success_alerts[i];

            // Set a timeout to hide the element after 2 seconds (2000 milliseconds)
            setTimeout(function(alertElement) {
                // Hide the element by setting its display style to 'none'
                alertElement.style.display = 'none';
            }, 20000, success_alert); // 2 seconds in milliseconds
        }
    });
</script>
<script>
    function validateFileUpload(input) {
        var files = input.files;

        // Check if any files were selected
        if (files.length === 0) {
            alert('Please select a file.');
            input.value = ''; // Clear the input value
            return;
        }

        // Iterate through each selected file
        for (var i = 0; i < files.length; i++) {
            var file = files[i];
           
            // Check file size
            var maxSize = 2 * 1024 * 1024; // 2MB in bytes
            if (file.size > maxSize) {
                alert('File size exceeds the maximum limit of 2MB.');
                input.value = ''; // Clear the input value
                return;
            }
 
        }

        // Check the number of files uploaded
        var maxFiles = 5;
        if (files.length > maxFiles) {
            alert('You can only upload a maximum of 5 files.');
            input.value = ''; // Clear the input value
            return;
        }

       
    }

</script>


<script>
$(document).ready(function() {   
    
    $('#imageUpload').on('change', function() {
        var files = this.files;
        var errorData = JSON.parse($('#error-data').val());

        // Validate file upload
        validateFileUpload(files, errorData);
    });
});

function validateFileUpload(files, errorData) {
    if (files.length === 0) {
        displayError('Please select a file.');
        return;
    }

    if (errorData.length === 1) {
        // Single set of error data
        var singleErrorData = errorData[0];
        validateSingleErrorData(singleErrorData, files);
    } else {
        // Multiple sets of error data
        validateMultipleErrorData(errorData, files);
    }
}

function validateSingleErrorData(singleErrorData, files) {
    var fileCount = files.length;
    var minNo = parseInt(singleErrorData.minNo);
    var maxNo = parseInt(singleErrorData.maxNo);
    var maxSizeBytes = parseInt(singleErrorData.maxSize);

    if (fileCount < minNo || fileCount > maxNo) {
        displayError('Please upload between ' + minNo + ' and ' + maxNo + ' files.');
        return;
    }

    for (var i = 0; i < files.length; i++) {
        var fileSizeBytes = files[i].size;
        if (fileSizeBytes > maxSizeBytes) {
            displayError('File size exceeds the maximum limit of ' + maxSizeBytes + ' bytes.');
            return;
        }
    }
}

function validateMultipleErrorData(errorData, files) {
    var assetTypeCounts = {};

    errorData.forEach(function(error) {
        assetTypeCounts[error.assetType] = assetTypeCounts[error.assetType] + 1 || 1;
    });

    for (var assetType in assetTypeCounts) { 
        if (assetTypeCounts.hasOwnProperty(assetType)) {   
            var relevantErrorData = errorData.filter(function(error) {  
                return error.assetType === assetType;
            });
            validateAssetType(relevantErrorData, files);
        }
    }
}



function validateAssetType(relevantErrorData, files) {
    relevantErrorData.forEach(function(error) {
        var minNo = parseInt(error.minNo);
        var maxNo = parseInt(error.maxNo);
        var maxSizeBytes = parseInt(error.maxSize);
        var formatsString = error.fileFormats;
        var allowedFormats = formatsString.toLowerCase().split(" ");

        // Convert FileList to an array
        var filesArray = Array.from(files);

        // Filter the array to get only the files whose extensions match the allowed formats
        var validFiles = filesArray.filter(function(file) {
            var fileExtension = getFileExtension(file.name).toLowerCase(); 
            return allowedFormats.includes(fileExtension);
        });

        var validFileCount = validFiles.length;

        if(validFileCount > 0){
            // Check if the assetType is the same, sum up all maxNo values
            var sumMaxNo = relevantErrorData.reduce(function(sum, currError) {
                if (currError.assetType === error.assetType) {
                    return sum + parseInt(currError.maxNo);
                }
                return sum;
            }, 0);

            if (validFileCount > sumMaxNo) {
                displayError('Please upload maximum ' + sumMaxNo + ' files for ' + error.assetType + '.');
                return;
            }

            validFiles.forEach(function(file) {
                var fileSizeBytes = file.size;
                if (fileSizeBytes > maxSizeBytes) {
                    displayError('File size exceeds the maximum limit of ' + maxSizeBytes + ' bytes for ' + error.assetType + '.');
                    return;
                }
            });
        } else {
            displayError('Please select correct file format for ' + error.assetType + '.');
        }
    });
}


// Function to get file extension from file name
function getFileExtension(filename) {
    return filename.split('.').pop();
}

function displayError(message) {
    // Display error message to the user, e.g., near the file input field
    alert(message);
    $('#imageUpload').val('');
}
</script>


@endsection