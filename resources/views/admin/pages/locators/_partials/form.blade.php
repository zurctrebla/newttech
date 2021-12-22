@include('admin.includes.alerts')

@csrf

<div class="row">
    <div class="col-sm-4">
      <div class="form-group">
       <label>Localizador *</label>
       <input type="text" name="number" class="form-control" placeholder="Localizador:" value="{{ $user->number ?? old('number') }}" >
      </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
         <label>Comissão *</label>
         <input type="text" name="comission" class="form-control" placeholder="Comissão:" value="{{ $user->comission ?? old('comission') }}" >
        </div>
      </div>
    <div class="col-sm-4">
        <div class="form-group">
         <label>Serial *</label>
         <input type="text" name="serial" class="form-control" placeholder="serial:" value="{{ $user->serial ?? old('serial') }}" >
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
      <div class="form-group">
       <label>Parceiro *</label>
        <select name="role_id" class="form-control" required>
            <option value="">Escolha</option>
                {{-- @foreach($roles as $role)
                    <option value="{{ $role->id }}" @if(isset($userRole) && $role->name == $userRole) selected @endif>
                        {{ $role->name }}
                    </option>
                @endforeach --}}
        </select>
      </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
         <label>Cliente *</label>
            <select name="role_id" class="form-control" required>
                <option value="">Escolha</option>
                    {{-- @foreach($roles as $role)
                        <option value="{{ $role->id }}" @if(isset($userRole) && $role->name == $userRole) selected @endif>
                            {{ $role->name }}
                        </option>
                    @endforeach --}}
            </select>
        </div>
      </div>
    <div class="col-sm-4">
        <div class="form-group">
         <label>Jogo *</label>
            <select name="game_id" class="form-control" required>
                <option value="">Escolha</option>
                    @foreach($games as $game)
                        <option value="{{ $game->id }}" @if(isset($$game->id )) selected @endif>
                            {{ $game->name }}
                        </option>
                    @endforeach
            </select>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
      <div class="form-group">
        <button type="submit" class="btn btn-dark">Enviar</button>
      </div>
    </div>
</div>