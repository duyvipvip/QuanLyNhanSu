const router = require('express').Router();
const hedaotaoController = require("../controller/hedaotao.controller");

router.get('/all', getHeDaoTaos);
router.get('/only', getHeDaoTao);
router.post('/create', createHeDaoTao);
router.post('/delete', deleteHeDaoTao);
router.post('/update', updateHeDaoTao);
module.exports = router;

function getHeDaoTaos(req, res, next){
    hedaotaoController.getHeDaoTaos()
        .then((hedaotao) => {
            res.send(hedaotao);
        })
        .catch((err) => {

        });
}

function updateHeDaoTao(req, res, next){
    hedaotaoController.updateHeDaoTao(req.body)
        .then((hedaotao) => {
            res.send(hedaotao);
        })
        .catch((err) => {

        });
}

function getHeDaoTao(req, res, next){
    let idhedaotao = req.query.idhedaotao;
    hedaotaoController.getHeDaoTao(idhedaotao)
        .then((hedaotao) => {
            res.send(hedaotao);
        })
        .catch((err) => {

        });
}

function createHeDaoTao(req, res, next){
    hedaotaoController.createHeDaoTao(req.body)
        .then((hedaotao) => {
            res.send(hedaotao);
        })
        .catch((err) => {

        });
}

function deleteHeDaoTao(req, res, next){
    hedaotaoController.deleteHeDaoTao(req.body.idhedaotao)
        .then((hedaotao) => {
            res.send(hedaotao);
        })
        .catch((err) => {

        });
}


