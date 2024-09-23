<template>
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">            
        </head>
        <body>

            <div class="container">
                <div class="livros__list table  my-3">
                        
                    <div class="customers__titlebar dflex justify-content-between align-items-center">
                        <div class="customers__titlebar--item">
                            <h1 class="my-1">Livros</h1>
                        </div>
                        <div class="customers__titlebar--item">
                            <button @click="newLivros" class="btn btn-secondary my-1" >
                                Adicionar Livro
                            </button>
                        </div>
                    </div>
                    <div class="table-search">
                        <div>
                            <button class="search-select">
                                Pesquisar Livro
                            </button>
                        </div>
                        <div class="relative">
                            <input class="search-input" type="text" name="search" placeholde="Seach livro..." v-model="searchQuery">
                        </div>
                    </div>
                    <div class="table--heading mt-2 list_heading " style="padding-top: 20px;background:#FFF">
                        <p class="table--heading--col">
                            Livro
                        </p>
                        <p class="table--heading--col">Ano</p>
                        <p class="table--heading--col">
                            Autor
                        </p>
                        <p class="table--heading--col">
                            Editora
                        </p>
                        <p class="table--heading--col">
                            Gênero
                        </p>
                        <p class="table--heading--col actions">Ações</p>
                    </div>

                    <div class="table--items list_item" v-for="livro in livros" :key="livro.id" >
                        <p class="table--items--col">
                            {{livro.titulo}}
                        </p>
                        <p class="table--items--col">
                            {{formatarData(livro.ano_lancamento)}}
                        </p>
                        <p class="table--items--col">
                            {{livro.autores.nome}}
                        </p>
                        <p class="table--items--col">
                            {{livro.editoras.nome}}
                        </p> 
                        <p class="table--items--col">
                            {{livro.generos.nome}}
                        </p>  
                        <div>     
                            <button class="btn-icon btn-icon-success" @click="onEdit(livro.id)" >
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                            <button class="btn-icon btn-icon-danger" @click="deleteLivro(livro.id)">
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </div>
                    </div>
                    <div class="table-paginate mt-3">
                        <div class="pagination">
                            <a 
                            href="#" 
                            class="btn" 
                            v-for="(link, index) in links"
                            :key="index"
                            :class="{active: link.active, disabled: !link.url}"
                            @click="changePage(link)"
                            v-html="translateLabel(link.label)"
                            ></a>
                        </div>
                    </div>
                </div>
            </div>
        </body>
    </html>
</template>

<script setup>
    import { useLivros } from "@/composables/livros";

    const {
        livros,
        links,
        searchQuery,
        newLivros,
        getLivros,
        changePage,
        onEdit,
        deleteLivro,
        translateLabel,
        formatarData
    } = useLivros();
</script>