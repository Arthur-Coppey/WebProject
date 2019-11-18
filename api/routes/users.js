const express = require('express'),
    router = express.Router(),
    controller = require('../controllers/user.controller'),
    bcrypt = require('bcrypt');

/* GET users listing. */
router.get('/', function(req, res, next) {
    controller.index(req.header('Authorization')).then(body => {
        res.json(body);
    });
});

router.get('/events', function (req, res, next) {
    controller.events(req.header('Authorization')).then(body => {
        res.json(body);
    });
});

router.get('/:id', function (req, res, next) {
    controller.show(req.header('Authorization'), Number(req.params.id)).then(body => {
        res.json(body);
    });
});

router.post('/register', function (req, res, next) {
    controller.register(req.body.email, req.body.password).then(body => {
        res.json({token: body});
    });
});

module.exports = router;
