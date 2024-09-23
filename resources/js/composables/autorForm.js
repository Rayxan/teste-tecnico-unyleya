import { reactive, ref, onMounted } from 'vue';
import { useRouter, useRoute } from 'vue-router';
import axios from 'axios';

export function useAutorForm() {
    const form = reactive({
        nome: "",
        ano_nascimento: "",
        sexo: "",
        nacionalidade: "",
    });

    const nacionalidades = ref([]);

    const router = useRouter();
    const route = useRoute();
    
    const errors = ref([]);
    const editMode = ref(false);

    onMounted(() => {
        if (route.name === 'autores.edit') {
            editMode.value = true;
            getAutor();
        }
        getNacionalidades(); 
    });

    const getNacionalidades = async () => {
        let response = await axios.get('/nacionalidades/list');
        console.log(response.data.nacionalidades);
        nacionalidades.value = response.data.nacionalidades;
    };

    const getAutor = async () => {
        let response = await axios.get(`/autores/${route.params.id}/edit`);
        form.nome = response.data.autor.nome;
        form.ano_nascimento = response.data.autor.ano_nascimento;
        form.sexo = response.data.autor.sexo;
        form.nacionalidade = response.data.autor.nacionalidade;
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
        nacionalidades,
        errors,
        editMode,
        handleSave,
    };
}