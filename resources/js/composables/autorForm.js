import { reactive, ref, onMounted } from 'vue';
import { useRouter, useRoute } from 'vue-router';
import axios from 'axios';

export function useAutorForm() {
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
        if (route.name === 'autores.edit') {
            editMode.value = true;
            getAutor();
        }
    });

    const getAutor = async () => {
        let response = await axios.get(`/autores/${route.params.id}/edit`);
        form.titulo = response.data.autor.titulo;
        form.ano_lancamento = response.data.autor.ano_lancamento;
        form.fk_autor = response.data.autor.fk_autor;
        form.fk_editora = response.data.autor.fk_editora;
        form.fk_genero = response.data.autor.fk_genero;
    };

    const handleSave = (values, actions) => {
        if (editMode.value) {
            updateAutor(values, actions);
        } else {
            createAutor(values, actions);
        }
    };

    const createAutor = (values, actions) => {
        axios.post('/autores', form)
        .then((response) => {
            router.push('/')
            toast.fire({ icon: "success", title: "Autor adicionado com sucesso"})
        })
        .catch((error) => {
            if(error.response.status === 422){
                errors.value = error.response.data.errors
            }
        })
    }

    const updateAutor = (values, actions) => {
        axios.put(`/autores/update/${route.params.id}`, form)
        .then((response) => {
            router.push('/')
            toast.fire({ icon: "success", title: "Autor atualizado com sucesso"})
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