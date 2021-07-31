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
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text"
                                for="inputGroupSelect01">Raça</label>
                            <select class="form-select" name="breed_id"id="inputGroupSelect01">
                                <option selected value="0">Sem raça definida</option>
                                @foreach ($breeds as $breed)
                                    <option value="{{ $breed->id }}">{{ $breed->title }}</option>
                                @endforeach
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
@endsection

