const express = require('express'),
    router = express.Router(),
    controller = require('../controllers/event.controller');

/* GET events listing. */
router.get('/', function (req, res, next) {
    controller.index(req.header('Authorization')).then(body => {
        res.json(body);
    });
});

router.get('/:id/users', function (req, res, next) {
    controller.users(req.header('Authorization'), req.params.id).then(body => {
        res.json(body);
    });
});

router.get('/:id', function (req, res, next) {
    controller.show(req.header('Authorization'), Number(req.params.id)).then(body => {
        res.json(body);
    });
});

module.exports = router;
