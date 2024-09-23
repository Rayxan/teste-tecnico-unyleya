import { reactive, ref, onMounted } from 'vue';
import { useRouter, useRoute } from 'vue-router';
import axios from 'axios';

export function useEditoraForm() {
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
        if (route.name === 'editoras.edit') {
            editMode.value = true;
            getEditora();
        }
    });

    const getEditora = async () => {
        let response = await axios.get(`/editoras/${route.params.id}/edit`);
        form.nome = response.data.editora.nome;
        form.ano_nascimento = response.data.editora.ano_nascimento;
        form.sexo = response.data.editora.sexo;
        form.nacionalidade = response.data.editora.nacionalidade;
    };

    const handleSave = (values, actions) => {
        if (editMode.value) {
            updateEditora(values, actions);
        } else {
            createEditora(values, actions);
        }
    };

    const createEditora = (values, actions) => {
        axios.post('/editoras', form)
        .then((response) => {
            router.push('/')
            toast.fire({ icon: "success", title: "Editora adicionado com sucesso"})
        })
        .catch((error) => {
            if(error.response.status === 422){
                errors.value = error.response.data.errors
            }
        })
    }

    const updateEditora = (values, actions) => {
        axios.put(`/editoras/update/${route.params.id}`, form)
        .then((response) => {
            router.push('/')
            toast.fire({ icon: "success", title: "Editora atualizado com sucesso"})
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