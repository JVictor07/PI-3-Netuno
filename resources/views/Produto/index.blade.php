<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página de Clientes</title>


  <link href="{{ asset('css/header.css') }}" rel="stylesheet">
  <link href="{{ asset('css/main.css') }}" rel="stylesheet">
  <link href="{{ asset('css/menu.css') }}" rel="stylesheet">
  <link href="{{ asset('css/pg-users.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Rhodium+Libre&display=swap" rel="stylesheet">
  <script src="{{ asset('js/menu.js') }}"></script>

    <script>
        function remover(){
            return confirm('Você deseja remover o produto ?');
        }
    </script>
</head>
<body>
  <header>
    <div class="bg-blue">
    </div>
    <div class="bg-yellow">
    </div>
  </header>
  <main class="main">

    @include('layouts.menu')

    <section class="main__page-content right-container">
      <div class="page-content__title">
        <h1 class="title__text">Produtos</h1>
        <a href="{{ Route('produto.create') }}">
          <button type="button" class="title__include">
            <img src="{{ asset('svgs/plus-square.svg') }}" alt="+">
            Incluir Registro
          </button>
        </a>
      </div>

        <!-- Mostrando mensagem na tela com a session -->
        @if(session()->has('valido'))
            <div class="valido">
               {{session()->get('valido')}}
            </div>
        @endif

            <!-- Mostrando mensagem na tela com a session -->
        @if(session()->has('invalido'))
            <div class="invalido">
                {{session()->get('invalido')}}
            </div>
        @endif

      <form class="page-content__inputs inputs-group">
        <label class="input-container input-container-10">
          Código
          <input name="codigo" type="text" class="input-container__input">
        </label>
        <label class="input-container input-container-40">
          Nome
          <input name="nome" type="text" class="input-container__input">
        </label>
        <label class="input-container input-container-30">
          Categoria
          <select name="category_id">
                <option value=""></option>
                @foreach ($categories as $category )
                    <option value="{{$category->id}}">{{$category->cate_nome}}</option>
                @endforeach
            </select>
        </label>
        <button type="submit" class="inputs__search">
          <img  src="{{ asset('svgs/search-icon.svg') }}" alt="buscar">
          Buscar
        </button>
      </form>

      <table class="page-content__table"  border="0" cellpadding="0" cellspacing="0">
        <tr align="center">
          <th></th>
          <th>Cód.</th>
          <th>Nome</th>
          <th>Preço</th>
          <th>Ação</th>
        </tr>
        @foreach($produtos as $produto)
            <tr>
                <td><img style="width: 50px; height:50px;" src="{{ asset($produto ->hx_foto1) }}"></td>
                <td>{{ $produto -> id }}</td>
                <td>{{ $produto -> ds_nome }}</td>
                <td>{{ number_format($produto -> vl_produto, 2, ',', '.') }}</td>
                <td>
                    <a href="#" >
                        <button class='table__button table__edit' type='button'>
                            <img src="{{ asset('svgs/edit-icon.svg') }}"  alt='editar'>
                            View
                        </button>
                    </a>
                    <a href="{{ route('produto.edit', $produto->id) }}" >
                        <button class='table__button table__edit' type='button'>
                            <img src="{{ asset('svgs/edit-icon.svg') }}"  alt='editar'>
                            Alterar
                        </button>
                    </a>
                    <form style="display: inline;" method="POST" action="{{route('produto.destroy', $produto->id) }}" onsubmit="return remover();">
                        @method('DELETE')
                        @csrf
                        <button type="submit"  class='table__button table__remove'>
                            <img src="{{ asset('svgs/trash-icon.svg') }}" alt='remover'>
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
      </table>
    </section>
  </main>
</body>
</html>
