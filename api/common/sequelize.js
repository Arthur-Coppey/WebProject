const Sequelize = require('sequelize');

const sequelize = new Sequelize(process.env.DB_URL);
const DataTypes = Sequelize.DataTypes;

module.exports = {sequelize, DataTypes};
