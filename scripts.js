const menuItems = [
    {
        id: 1,
        name: "ステーキ",
        category: "main",
        rice: 1500,
        description: "ジューシーなビーフステーキ"
    },
    {
        id: 2,
        name: "ケーキ",
        category: "dessert",
        price: 600,
        sescription: "フワフワのチョコレートケーキ"
    },
    {
        id: 3,
        name: "コーヒー",
        category: "drinks",
        price: 300,
        escription: "アロマ香るホットコーヒー"
    },
    {
        id: 4,
        name: "寿司",
        category: "main",
        rice: 1200,
        description: "新鮮なネタの握り寿司"
    },
    {
        id: 5,
        name: "アイスクリーム",
        category: "dessert",
        rice: 500,
        description: "滑らかなバニラアイスクリーム"
    },
];




function showModal() {
    console.log("Hi i am showModal clicked ");
    document.getElementById("modal-bg").classList.remove("NoDisplayModal")
    document.getElementById("modal-container").classList.remove("NoDisplayModal")
}
function NoShowModal() {
    console.log("hi i am NoShowModal function  ");
    document.getElementById("modal-bg").classList.add("NoDisplayModal")
    document.getElementById("modal-container").classList.add("NoDisplayModal")
}
