@extends('include.app')
@section('title', 'Pets')

@section('content')
<form action="{{ route('pets.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Dados básicos</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="basicInput">Apelido do animal</label>
                            <input type="text" class="form-control"name="nickname" id="nickName"
                                placeholder="Rex ou Totó">
                        </div>
                        <div class="form-group">
                            <label for="thumb">Foto do animal</label>
                            <input type="file" name="thumb" class="">
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Descrição</label>
                            <textarea name="description" class="form-control" id="exampleFormControlTextarea1"
                                rows="3"></textarea>
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text"
                                for="inputGroupSelect01">Categoria</label>
                            <select class="form-select" name="category_id"id="inputGroupSelect01">
                                <option selected>Escolha uma</option>
                                <option value="1">Cachorro</option>
                                <option value="2">Gato</option>
                                <option value="3">Bode</option>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text"
                                for="inputGroupSelect01">Raça</label>
                            <select class="form-select" name="breed_id"id="inputGroupSelect01">
                                <option selected>Sem raça definida</option>
                                <option value="1">Raça um</option>
                                <option value="2">Raça dois</option>
                                <option value="3">Raça três</option>
                            </select>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-2 mx-auto">
                    <button class="btn btn-primary mb-5"type="submit" >Cadastrar</button>
                </div>
            </div>

        </div>
        {{-- <div class="card">
            <div class="card-header">
                <h4 class="card-title">Endereço ( onde esse pet foi encontrado )</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group">
                            <label for="street">Rua</label>
                            <input type="text" class="form-control"name="nickname" id="street"
                                placeholder="Rua Washington Jorge da silva">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="basicInput">Número</label>
                            <input type="text" class="form-control"name="nickname" id="basicInput"
                                placeholder="000">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="neighbourhood">Bairro</label>
                            <input type="text" class="form-control"name="nickname" id="neighbourhood"
                                placeholder="Centro">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="city">Cidade / Vila</label>
                            <input type="text" class="form-control"name="nickname" id="city"
                                placeholder="Paulo Afonso">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label
                                for="inputGroupSelect01">Estado / UF</label>
                            <select class="form-select" id="inputGroupSelect01">
                                <option selected>Selecione</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

    </div>
</form>
@push('scripts')

<!-- filepond validation -->
<script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>

<!-- image editor -->
<script src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-crop/dist/filepond-plugin-image-crop.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-filter/dist/filepond-plugin-image-filter.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-resize/dist/filepond-plugin-image-resize.js"></script>

<!-- toastify -->
<script src="{{ url('assets/vendors/toastify/toastify.js')}}"></script>

<!-- filepond -->
<script src="{{ url('https://unpkg.com/filepond/dist/filepond.js')}}"></script>
<script>
    // register desired plugins...
	FilePond.registerPlugin(
        // validates the size of the file...
        FilePondPluginFileValidateSize,
        // validates the file type...
        FilePondPluginFileValidateType,

        // calculates & dds cropping info based on the input image dimensions and the set crop ratio...
        FilePondPluginImageCrop,
        // preview the image file type...
        FilePondPluginImagePreview,
        // filter the image file
        FilePondPluginImageFilter,
        // corrects mobile image orientation...
        FilePondPluginImageExifOrientation,
        // calculates & adds resize information...
        FilePondPluginImageResize,
    );

    // Filepond: Basic
    FilePond.create( document.querySelector('.basic-filepond'), {
        allowImagePreview: false,
        allowMultiple: false,
        allowFileEncode: false,
        required: false
    });

    // Filepond: Multiple Files
    FilePond.create( document.querySelector('.multiple-files-filepond'), {
        allowImagePreview: false,
        allowMultiple: true,
        allowFileEncode: false,
        required: false
    });

    // Filepond: With Validation
    FilePond.create( document.querySelector('.with-validation-filepond'), {
        allowImagePreview: false,
        allowMultiple: true,
        allowFileEncode: false,
        required: true,
        acceptedFileTypes: ['image/png'],
        fileValidateTypeDetectType: (source, type) => new Promise((resolve, reject) => {
            // Do custom type detection here and return with promise
            resolve(type);
        })
    });

    // Filepond: ImgBB with server property
    FilePond.create( document.querySelector('.imgbb-filepond'), {
        allowImagePreview: false,
        server: {
            process: (fieldName, file, metadata, load, error, progress, abort) => {
                // We ignore the metadata property and only send the file

                const formData = new FormData();
                formData.append(fieldName, file, file.name);

                const request = new XMLHttpRequest();
                // you can change it by your client api key
                request.open('POST', 'https://api.imgbb.com/1/upload?key=762894e2014f83c023b233b2f10395e2');

                request.upload.onprogress = (e) => {
                    progress(e.lengthComputable, e.loaded, e.total);
                };

                request.onload = function() {
                    if (request.status >= 200 && request.status < 300) {
                        load(request.responseText);
                    }
                    else {
                        error('oh no');
                    }
                };

                request.onreadystatechange = function() {
                    if (this.readyState == 4) {
                        if(this.status == 200) {
                            let response = JSON.parse(this.responseText);

                            Toastify({
                                text: "Success uploading to imgbb! see console f12",
                                duration: 3000,
                                close:true,
                                gravity:"bottom",
                                position: "right",
                                backgroundColor: "#4fbe87",
                            }).showToast();

                            console.log(response);
                        } else {
                            Toastify({
                                text: "Failed uploading to imgbb! see console f12",
                                duration: 3000,
                                close:true,
                                gravity:"bottom",
                                position: "right",
                                backgroundColor: "#ff0000",
                            }).showToast();

                            console.log("Error", this.statusText);
                        }
                    }
                };

                request.send(formData);
            }
        }
    });

    // Filepond: Image Preview
    FilePond.create( document.querySelector('.image-preview-filepond'), {
        allowImagePreview: true,
        allowImageFilter: false,
        allowImageExifOrientation: false,
        allowImageCrop: false,
        acceptedFileTypes: ['image/png','image/jpg','image/jpeg'],
        fileValidateTypeDetectType: (source, type) => new Promise((resolve, reject) => {
            // Do custom type detection here and return with promise
            resolve(type);
        })
    });

    // Filepond: Image Crop
    FilePond.create( document.querySelector('.image-crop-filepond'), {
        allowImagePreview: true,
        allowImageFilter: false,
        allowImageExifOrientation: false,
        allowImageCrop: true,
        acceptedFileTypes: ['image/png','image/jpg','image/jpeg'],
        fileValidateTypeDetectType: (source, type) => new Promise((resolve, reject) => {
            // Do custom type detection here and return with promise
            resolve(type);
        })
    });

        // Filepond: Image Exif Orientation
    FilePond.create( document.querySelector('.image-exif-filepond'), {
        allowImagePreview: true,
        allowImageFilter: false,
        allowImageExifOrientation: true,
        allowImageCrop: false,
        acceptedFileTypes: ['image/png','image/jpg','image/jpeg'],
        fileValidateTypeDetectType: (source, type) => new Promise((resolve, reject) => {
            // Do custom type detection here and return with promise
            resolve(type);
        })
    });

    // Filepond: Image Filter
    FilePond.create( document.querySelector('.image-filter-filepond'), {
        allowImagePreview: true,
        allowImageFilter: true,
        allowImageExifOrientation: false,
        allowImageCrop: false,
        imageFilterColorMatrix: [
            0.299, 0.587, 0.114, 0, 0,
            0.299, 0.587, 0.114, 0, 0,
            0.299, 0.587, 0.114, 0, 0,
            0.000, 0.000, 0.000, 1, 0
        ],
        acceptedFileTypes: ['image/png','image/jpg','image/jpeg'],
        fileValidateTypeDetectType: (source, type) => new Promise((resolve, reject) => {
            // Do custom type detection here and return with promise
            resolve(type);
        })
    });

    // Filepond: Image Resize
    FilePond.create( document.querySelector('.image-resize-filepond'), {
        allowImagePreview: true,
        allowImageFilter: false,
        allowImageExifOrientation: false,
        allowImageCrop: false,
        allowImageResize: true,
        imageResizeTargetWidth: 200,
        imageResizeTargetHeight: 200,
        imageResizeMode: 'cover',
        imageResizeUpscale: true,
        acceptedFileTypes: ['image/png','image/jpg','image/jpeg'],
        fileValidateTypeDetectType: (source, type) => new Promise((resolve, reject) => {
            // Do custom type detection here and return with promise
            resolve(type);
        })
    });
</script>
@endpush
@endsection

