const Event = require('../models/event.model'),
    User = require('./user.controller'),
    userController = require('./user.controller');
const controller = {
    index: function (token) {
        return userController.verifyAuth(token).then((user) => {
            return Event.findAll().then((result) => {
                return result;
            });
        });

    },
    show: function (token, id) {
        return userController.verifyAuth(token).then(user => {
            return Event.findOne({
                where: {
                    id: id
                }
            }).then((result) => {
                return result;
            });
        });
    },
    users: function (token, id) {
        return userController.verifyAuth(token).then((user) => {
            if (user) {
                return Event.findOne({
                    where: {id: id}
                }).then(ev => {
                    return ev.getParticipants({attributes: ['first_name', 'last_name', 'email']});
                })
            }
        });
    }
};

module.exports = controller;
