<div class="modal fade" id="Modaladdmeta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-default" id="exampleModalLabel">Meta questões</h5>
                <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form method="POST" action="{{ route('exercicio.saveexer', 2) }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Quantidade de Questões</label>
                            <input class="form-control" type="number" id="quantidade_meta" name="quantidade_meta">
                        </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm bg-gradient-secondary" data-bs-dismiss="modal">Sair</button>
                <button type="submit" class="btn btn-sm bg-gradient-primary">Salvar</button>
            </div>
            </form>
        </div>
    </div>
</div>