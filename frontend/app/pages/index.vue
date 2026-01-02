<template>
  <div>
    <h1>名前リスト</h1>
  </div>
  <ul>
    <li v-for="(n, index) in names" :key="index">
      {{ n.name }}
    </li>
  </ul>
  <div>
    <h2>入力フォーム</h2>
    <input type="text" v-model="addName">
    <button @click="add">追加</button>
  </div>
</template>

<script setup>
const names = ref([])
const addName = ref('')

// 初期読み込み
  const { data } = await useFetch('http://localhost/api/names')
  names.value = data.value.data

// 追加
async function add() {
  const res = await $fetch('http://localhost/api/names', {
    method: "POST",
    body: {
      name: addName.value,
    }
  }
  )
  names.value = res.data
  addName.value = ''
}
</script>