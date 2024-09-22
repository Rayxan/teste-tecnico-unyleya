import { reactive, ref, onMounted } from 'vue';
import { useRouter, useRoute } from 'vue-router';
import axios from 'axios';

export function useLivroForm() {
    const form = reactive({
        titulo: "",
        ano_lancamento: "",
        fk_autor: "",
        fk_editora: "",
        fk_genero: "",
    });

    const router = useRouter();
    const route = useRoute();
    
    const errors = ref([]);
    const editMode = ref(false);

    onMounted(() => {
        if (route.name === 'livros.edit') {
            editMode.value = true;
            getLivro();
        }
    });

    const getLivro = async () => {
        let response = await axios.get(`/livros/${route.params.id}/edit`);
        form.titulo = response.data.livro.titulo;
        form.ano_lancamento = response.data.livro.ano_lancamento;
        form.fk_autor = response.data.livro.fk_autor;
        form.fk_editora = response.data.livro.fk_editora;
        form.fk_genero = response.data.livro.fk_genero;
    };

    const handleSave = (values, actions) => {
        if (editMode.value) {
            updateLivro(values, actions);
        } else {
            createLivro(values, actions);
        }
    };

    const createLivro = (values, actions) => {
        axios.post('/livros', form)
        .then((response) => {
            router.push('/')
            toast.fire({ icon: "success", title: "Livro adicionado com sucesso"})
        })
        .catch((error) => {
            if(error.response.status === 422){
                errors.value = error.response.data.errors
            }
        })
    }

    const updateLivro = (values, actions) => {
        axios.put(`/livros/update/${route.params.id}`, form)
        .then((response) => {
            router.push('/')
            toast.fire({ icon: "success", title: "Livro atualizado com sucesso"})
        })
        .catch((error) => {
            if(error.response.status === 422){
                errors.value = error.response.data.errors
            }
        })
    }

    return {
        form,
        errors,
        editMode,
        handleSave,
    };
}