const router = require('express').Router();
const chucvuController = require("../controller/chucvu.controller");

router.get('/all', getChucVuS);
router.get('/only', getChucVu);
router.post('/create', createChucVu);
router.post('/delete', deleteChucVu);
router.post('/update', updateChucVu);
module.exports = router;

function getChucVuS(req, res, next){
    chucvuController.getChucVus()
        .then((chucvu) => {
            res.send(chucvu);
        })
        .catch((err) => {

        });
}

function updateChucVu(req, res, next){
    chucvuController.updateChucVu(req.body)
        .then((chucvu) => {
            res.send(chucvu);
        })
        .catch((err) => {

        });
}

function getChucVu(req, res, next){
    let idchucvu = req.query.idchucvu;
    chucvuController.getChucVu(idchucvu)
        .then((chucvu) => {
            res.send(chucvu);
        })
        .catch((err) => {

        });
}

function createChucVu(req, res, next){
    chucvuController.createChucVu(req.body)
        .then((chucvu) => {
            res.send(chucvu);
        })
        .catch((err) => {

        });
}

function deleteChucVu(req, res, next){
    chucvuController.deleteChucVu(req.body.idchucvu)
        .then((chucvu) => {
            res.send(chucvu);
        })
        .catch((err) => {

        });
}


