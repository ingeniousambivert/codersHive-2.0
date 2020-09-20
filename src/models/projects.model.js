// projects-model.js - A mongoose model
//
// See http://mongoosejs.com/docs/models.html
// for more of what you can do here.
module.exports = function (app) {
  const modelName = 'projects';
  const mongooseClient = app.get('mongooseClient');

  const { Schema } = mongooseClient;
  const { ObjectId } = mongooseClient.Schema.Types;

  const schema = new Schema(
    {
      title: { type: String, required: true },
      description: { type: String },
      owner: { type: String, required: true },
      active: {
        type: Boolean,
        default: true
      },
      managers: [
        {
          type: ObjectId,
          ref: 'users'
        }
      ],
      members: [
        {
          type: ObjectId,
          ref: 'users'
        }
      ]
    },
    {
      timestamps: true
    }
  );


  // This is necessary to avoid model compilation errors in watch mode
  // see https://mongoosejs.com/docs/api/connection.html#connection_Connection-deleteModel
  if (mongooseClient.modelNames().includes(modelName)) {
    mongooseClient.deleteModel(modelName);
  }
  return mongooseClient.model(modelName, schema);

};