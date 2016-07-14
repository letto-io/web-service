class CreateUsers < ActiveRecord::Migration[5.0]
  def change
    create_table :users do |t|
      t.string :email, limit: 100, null: false
      t.string :password_digest, null: false

      t.index :email, unique: true
    end
  end
end
