class AddClosedFlagToSurvey < ActiveRecord::Migration[5.0]
  def change
    add_column :surveys, :closed, :boolean
  end
end
