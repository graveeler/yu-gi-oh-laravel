@extends('_template')

@section('content')


    <div class="container-lg">

        <div class="row mt-5">
            <div class="col-3"></div>
            <div class="col-6">

                <form action="" method="get">

                    <div class="input-group mb-3">
                        <input type="text"
                               name="search"
                               class="form-control"
                               placeholder="Digite o texto de alguma carta"
                               value="{{ old('search') }}"
                        >
                        <button type="submit" class="input-group-text" id="basic-addon2">Pesquisar</button>
                    </div>
                </form>

            </div>
            <div class="col-3"></div>

        </div>


        <table class="table mt-3">



            @foreach ($cards as $card)

                <tr data-english-name="{{ $card->name }}"
                    data-portuguese-name="{{ $card->name_pt_br }}"
                    data-level="{{ $card->level }}"
                    data-type="[{{ $card->race . ' / ' . $card->frameType }}]"
                    data-description="{{ $card->description }}"
                    data-description-pt-br="{{ $card->description_pt_br }}"
                    data-frametype="{{ $card->frameType }}"
                    data-atk="{{ $card->atk }}"
                    data-def="{{ $card->def }}"
                    data-linkval="{{ $card->linkval }}"
                    data-attribute="{{ $card->attribute }}"
                    data-banlists="{{ $card->banlists }}"
                    data-formats="{{ $card->cardFormats }}">
                    <td>
                        <img src="{{ $card->cardImageSmall->image_url_small }}" alt="{{ $card->name }}"
                             style="height: 180px; width: auto; cursor: pointer;" data-bs-toggle="modal"
                             data-bs-target="#imageModal">
                    </td>
                    <td>

                        <h6> {{ $card->name . ' / ' . $card->name_pt_br }}</h6>
                        <div class="mb-2 d-md-flex justify-content-md-between">
                            <div>
                                <img
                                    src="https://www.db.yugioh-card.com/yugiohdb/external/image/parts/attribute/attribute_icon_{{ strtolower($card->attribute) }}.png"
                                    width="20" alt="">


                                @if ($card->frameType != 'spell' && $card->frameType != 'trap')

                                    <span style="font-size: 14px"> {{ $card->attribute }} </span>
                                    <span>&nbsp; | &nbsp;&nbsp;</span>

                                    @if ($card->frameType == 'link')
                                        <img
                                            src="https://www.db.yugioh-card.com/yugiohdb/external/image/parts/link_pc/link846123.png"
                                            width="20" alt="">
                                    @else
                                        <img
                                            src="https://www.db.yugioh-card.com/yugiohdb/external/image/parts/icon_level.png"
                                            width="20" alt="">
                                    @endif

                                    <span style="font-size: 14px">

                                        @if ($card->frameType == 'link')
                                            Link {{ $card->linkval }}
                                        @else
                                            Level {{ $card->level }}
                                        @endif;

                                    </span>


                                    <span class="d-none d-sm-inline"> &nbsp;&nbsp; | &nbsp;&nbsp;</span>

                                @endif


                                <span style="font-size: 14px"
                                      class="d-block d-sm-inline"> [{{ $card->race . ' / ' . $card->frameType }}]</span>
                                <span class="d-none d-md-inline"> &nbsp;&nbsp;&nbsp;&nbsp;</span>

                            </div>

                            <div>
                                @if ($card->frameType != 'spell' && $card->frameType != 'trap')
                                    <span style="font-size: 14px"
                                          class="d-block d-sm-inline"> ATK {{ $card->atk }} </span>
                                    <span class="d-none d-sm-inline"> &nbsp;&nbsp; / &nbsp;&nbsp;</span>
                                    <span style="font-size: 14px"
                                          class="d-block d-sm-inline"> DEF {{ $card->def ?? ' &nbsp; &nbsp;- &nbsp; &nbsp;' }} </span>
                                @endif

                            </div>
                        </div>


                        <p style="font-size: 14px"> {{ str_replace('●', '<br>●', $card->description) }}</p>
                    </td>
                </tr>
                <tr style=" background-color: transparent"><!-- Linha vazia como espaçadora -->
                    <td style="height: 10px; background-color: transparent; border: none"></td>
                </tr>

            @endforeach


        </table>
    </div>
    {{ $cards->links() }}


    <!--Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel">
        <div class="modal-dialog modal-fullscreen modal-dialog-centered px-5">
            <div class="modal-content border-0 mx-5">
                <div class="modal-header border-0">
                    <h1 class="modal-title fs-5" id="imageModalLabel"> Título do Card </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body border-0 pt-0">
                    <div class="card mb-3 border-0">
                        <div class="row g-0">
                            <div class="col-lg-5">
                                <!--Placeholder da imagem do modal-->
                                <img id="modalImage" src="" class="img-fluid rounded-start" alt="Imagem do Card">
                            </div>
                            <div class="col-lg-7 d-flex">
                                <div class="card-body text-start">
                                    <!--Detalhes principais do card-->
                                    <div class="mb-2">
                                        <!--Detalhes como Atributo, Nível, Tipo, ATK e DEF-->
                                        <span id="modalDetails"></span>
                                    </div>

                                    <!--Descrição em Inglês-->
                                    <h6 id="description" class="card-title"> Description:</h6>
                                    <p id="modalDescription" class="card-text"> Descrição em inglês aqui...</p>

                                    <!--Descrição em Português-->
                                    <h6 id="descricao" class="card-title"> Descrição:</h6>
                                    <p id="modalDescriptionPtBr" class="card-text"> Descrição em português aqui...</p>

                                    <div class="row">
                                        <div class="col-md-6 col-lg-6">
                                            <strong>Formatos: </strong>
                                            <ul id="modalFormats">

                                            </ul>
                                        </div>
                                        <br>
                                        <div class="col-md-6 col-lg-6">
                                            <strong>Banimentos: </strong>
                                            <ul id="modalBanlist">

                                            </ul>
                                        </div>
                                    </div>

                                    <div>
                                        <!--Tabela de coleções e raridades-->
                                        <table class="table table-borderless table-sm">
                                            <thead>
                                            <tr>
                                                <th scope="col"> Coleção</th>
                                                <th scope="col"> Raridade</th>
                                            </tr>
                                            </thead>
                                            <tbody id="modalCollections">
                                            <!--Tabela de coleções será preenchida dinamicamente-->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


