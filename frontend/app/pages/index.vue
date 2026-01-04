<template>
  <div>
    <h1>名前リスト</h1>
  </div>
  <table border="1" cellspacing="0">
  <tr v-for="(n, index) in names" :key="index">
    <td class="nameTd">
      <input type="text" class="txt" v-model="n.name">
    </td>
    <td><button @click="nameUpdate(n)" class="btn blue">更新</button></td>
    <td><button @click="nameDelete(n.id)" class="btn red">削除</button></td>
  </tr>
  </table>
  <div>
    <h2>入力フォーム</h2>
    <input type="text" class="addTxt" v-model="addName">
    <button @click="nameAdd" class="btn green">追加</button>
  </div>
</template>

<script setup>
const names = ref([])
const addName = ref('')

// 初期読み込み
  const { data } = await useFetch('http://localhost/api/names')
  names.value = data.value.data

// 追加
async function nameAdd() {
  const res = await $fetch('http://localhost/api/names', {
    method: "POST",
    body: {
      name: addName.value
    }
  })
  names.value = res.data
  addName.value = ''
}

// 更新
async function nameUpdate(name) {
  const res = await $fetch('http://localhost/api/names/' + name.id, {
    method: "PUT",
    body: {
      name: name.name
    }
  })
  alert("更新しました")
  names.value = res.data
}

// 削除
async function nameDelete(id) {
  const res = await $fetch('http://localhost/api/names/' + id, {
    method: "DELETE"
  })
  alert("削除しました")
    names.value = res.data
}
</script>

<style scoped>
.txt{
  border: none;
  outline: none;
}

   .nameTd{
    padding-left: 10px;
   }

.addTxt{
  padding: 10px;
  margin-right: 10px;
}

   .btn{
    border: none;
    padding: 10px;
    color: #FFF;
   }

   .red{
    background-color: red;
   }

   .blue{
    background-color: blue;
   }

    .green{
    background-color: green;
   }
</style>