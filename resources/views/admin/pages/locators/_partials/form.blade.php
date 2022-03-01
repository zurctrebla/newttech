@include('admin.includes.alerts')

@csrf

<div class="row">
    <div class="col-sm-4">
      <div class="form-group">
       <label>Localizador *</label>
       <input type="text" name="number" class="form-control" placeholder="Localizador:" value="{{ $locator->number ?? old('number') }}" >
      </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
         <label>Comissão *</label>
         <input type="text" name="comission" class="form-control" placeholder="Comissão:" value="{{ $locator->comission ?? old('comission') }}" >
        </div>
      </div>
    <div class="col-sm-4">
        <div class="form-group">
         <label>Serial *</label>
         <input type="text" name="serial" class="form-control" placeholder="serial:" value="{{ $locator->serial ?? old('serial') }}" >
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-3">
      <div class="form-group">
       <label>Parceiro *</label>
       <select name="partner_id" class="form-control" >
        <option value="">Escolha</option>
            @foreach($partners as $partner)
                <option value="{{ $partner->id }}" @if(isset($partner->id )) selected @endif>
                    {{ $partner->name }}
                </option>
            @endforeach
        </select>
      </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
         <label>Cliente *</label>
         <select name="client_id" class="form-control" >
            <option value="">Escolha</option>
                @foreach($clients as $client)
                    <option value="{{ $client->id }}" @if(isset($client->id )) selected @endif>
                        {{ $client->name }}
                    </option>
                @endforeach
            </select>
        </div>
      </div>
    <div class="col-sm-3">
        <div class="form-group">
         <label>Jogo *</label>
            <select name="game_id" class="form-control" required>
                <option value="">Escolha</option>
                    @foreach($games as $game)
                        <option value="{{ $game->id }}" @if(isset($game->id )) selected @endif>
                            {{ $game->name }}
                        </option>
                    @endforeach
            </select>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
         <label>Esp *</label>
            <select name="esp_id" class="form-control" >
                <option value="">Escolha</option>
                    @foreach($esps as $esp)
                        <option value="{{ $esp->id }}" @if(isset($$esp->id )) selected @endif>
                            {{ $esp->mac }}
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
