import { reactive, ref, onMounted } from 'vue';
import { useRouter, useRoute } from 'vue-router';
import axios from 'axios';

export function useGeneroForm() {
    const form = reactive({
        nome: "",
        ano_nascimento: "",
        sexo: "",
        nacionalidade: "",
    });

    const router = useRouter();
    const route = useRoute();
    
    const errors = ref([]);
    const editMode = ref(false);

    onMounted(() => {
        if (route.name === 'generos.edit') {
            editMode.value = true;
            getGenero();
        }
    });

    const getGenero = async () => {
        let response = await axios.get(`/generos/${route.params.id}/edit`);
        form.nome = response.data.genero.nome;
        form.ano_nascimento = response.data.genero.ano_nascimento;
        form.sexo = response.data.genero.sexo;
        form.nacionalidade = response.data.genero.nacionalidade;
    };

    const handleSave = (values, actions) => {
        if (editMode.value) {
            updateGenero(values, actions);
        } else {
            createGenero(values, actions);
        }
    };

    const createGenero = (values, actions) => {
        axios.post('/generos', form)
        .then((response) => {
            router.push('/generos')
            toast.fire({ icon: "success", title: "Genero adicionado com sucesso"})
        })
        .catch((error) => {
            if(error.response.status === 422){
                errors.value = error.response.data.errors
            }
        })
    }

    const updateGenero = (values, actions) => {
        axios.put(`/generos/update/${route.params.id}`, form)
        .then((response) => {
            router.push('/generos')
            toast.fire({ icon: "success", title: "Genero atualizado com sucesso"})
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