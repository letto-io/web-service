# == Schema Information
#
# Table name: enrolls
#
#  id             :integer          not null, primary key
#  profile        :integer          not null
#  person_id      :integer          not null
#  instruction_id :integer          not null
#

require 'rails_helper'

RSpec.describe Enroll, type: :model do
  pending "add some examples to (or delete) #{__FILE__}"
end
