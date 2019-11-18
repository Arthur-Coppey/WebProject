const sequelize = require('../common/sequelize').sequelize,
    DataTypes = require('../common/sequelize').DataTypes;

const Participant = sequelize.define('participants', {
    userId: {
        type: DataTypes.BIGINT,
        field: 'user_id'
    },
    eventId: {
        type: DataTypes.BIGINT,
        field: 'event_id'
    },
    createdAt: {
        type: DataTypes.DATE,
        field: 'created_at'
    },
    updatedAt: {
        type: DataTypes.DATE,
        field: 'updated_at'
    }
},
{
    freezeTableName: true
});

Participant.removeAttribute('id');

module.exports = Participant;
