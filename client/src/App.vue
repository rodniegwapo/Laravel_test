<script setup>
import { useAxios } from "@/composables/useAxios.js";
import { ref, onMounted, watch } from "vue";
import { useSelectFilterOption } from "@/composables/useSelectFilterOption.js";
import { watchDebounced } from "@vueuse/core";

const { filterOptions } = useSelectFilterOption();
const axios = useAxios();
const yearList = ref([]);
const year = ref(null);
const makeList = ref([]);
const make = ref(null);
const modelList = ref([]);
const model = ref(null);
const typeList = ref([]);
const type = ref(null);
const cars = ref([]);
const loading = ref(false);
const search = ref("");

const fetchYears = async () => {
    let item = await axios.get("/years");
    yearList.value = item.data.data.map((item) => {
        return { ...item, value: item.id, label: item.year };
    });
};

const fetchMakes = async () => {
    let item = await axios.get(`/years/${year.value}/makes`);
    makeList.value = item.data.map((item) => {
        return { ...item, value: item.id, label: item.name };
    });
};

const fetchModels = async () => {
    let item = await axios.get(
        `/years/${year.value}/makes/${make.value}/car-models`
    );
    console.log("models", item);
    modelList.value = item.data.map((item) => {
        return { ...item, value: item.id, label: item.name };
    });
};

const fetchTypes = async () => {
    let item = await axios.get(
        `/years/${year.value}/makes/${make.value}/car-models/${model.value}/types`
    );
    typeList.value = item.data.map((item) => {
        return { ...item, value: item.id, label: item.type };
    });
};

const fetchCars = async () => {
    loading.value = true;
    let selectedYear = year.value ? year.value : "";
    let selectedMake = make.value ? make.value : "";
    let selectedModel = model.value ? model.value : "";
    let selectedType = type.value ? type.value : "";
    let item = await axios.get(
        `/cars?search=${search.value}&year=${selectedYear}&make=${selectedMake}&model=${selectedModel}&type=${selectedType}`
    );
    cars.value = item.data.data;
    console.log("type list");
    loading.value = false;
};

onMounted(() => {
    fetchYears();
    fetchCars();
});

watch(year, (newVal, oldVal) => {
    make.value = null;
    if (!newVal) return;
    fetchMakes();
});

watch(make, (newVal, oldVal) => {
    model.value = null;
    if (!newVal) return;
    fetchModels();
});

watch(model, (newVal, oldVal) => {
    type.value = null;
    if (!newVal) return;
    fetchTypes();
});

watchDebounced(search, fetchCars, { debounce: 300 });

const columns = [
    {
        title: "Vin",
        dataIndex: "vin",
        key: "vin",
    },
    {
        title: "Car Type",
        dataIndex: "type",
        key: "type",
        responsive: ["md"],
    },
];
</script>

<template>
    <div class="flex w-full justify-center">
        <div class="bg-gray-50 max-w-[1000px] w-full p-8">
            <div class="flex justify-between">
                <div class="flex max-w-[600px] w-full justify-end">
                    <div class="w-1/4">
                        <a-select
                            v-model:value="year"
                            placeholder="Select Year"
                            class="w-full"
                            show-search
                            :options="yearList"
                            :filter-option="filterOptions"
                            allowClear
                            clearIcon
                        >
                        </a-select>
                    </div>
                    <div class="w-1/4">
                        <a-select
                            v-model:value="make"
                            placeholder="Select Make"
                            class="w-full"
                            show-search
                            :options="makeList"
                            :filter-option="filterOptions"
                            :disabled="!year"
                            allowClear
                        >
                        </a-select>
                    </div>
                    <div class="w-1/4">
                        <a-select
                            v-model:value="model"
                            placeholder="Select Model"
                            class="w-full"
                            show-search
                            :options="modelList"
                            :filter-option="filterOptions"
                            :disabled="!make"
                            allowClear
                        >
                        </a-select>
                    </div>
                    <div class="w-1/4">
                        <a-select
                            v-model:value="type"
                            placeholder="Select Type"
                            class="w-full"
                            show-search
                            :options="typeList"
                            :filter-option="filterOptions"
                            :disabled="!model"
                            allowClear
                        >
                        </a-select>
                    </div>
                    <div>
                        <a-button
                            class="text-white bg-blue-500"
                            @click="fetchCars()"
                            >Filter</a-button
                        >
                    </div>
                </div>

                <div>
                    <a-input
                        placeholder="Search"
                        v-model:value="search"
                    ></a-input>
                </div>
            </div>

            <div class="mt-10">
                <a-table
                    :columns="columns"
                    :row-key="(record) => record.key"
                    :data-source="cars"
                    :loading="loading"
                >
                    <template #bodyCell="{ column, record }">
                        <template v-if="column.key === 'type'">
                            <a>
                                {{ record.type.type }}
                            </a>
                        </template>
                    </template>
                </a-table>
            </div>
        </div>
    </div>
</template>

<style>
#app {
    font-family: Avenir, Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;

    color: #2c3e50;
    margin-top: 60px;
}
</style>
