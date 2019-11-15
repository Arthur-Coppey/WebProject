const sequelize = require('../common/sequelize').sequelize,
    DataTypes = require('../common/sequelize').DataTypes;

const Event = sequelize.define('events', {
    label: {
        type: DataTypes.STRING,
        field: 'label'
    },
    description: {
        type: DataTypes.STRING,
        field: 'description'
    },
    location: {
        type: DataTypes.STRING,
        field: 'location'
    },
    date: {
        type: DataTypes.DATE,
        field: 'date'
    },
    price: {
        type: DataTypes.FLOAT,
        field: 'price'
    },
    metaEventId: {
        type: DataTypes.BIGINT,
        field: 'meta_event_id'
    },
    deletedAt: {
        type: DataTypes.DATE,
        field: 'deleted_at'
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

module.exports = Event;
