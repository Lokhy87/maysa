START TRANSACTION;
DELETE FROM massage_translation;
DELETE FROM massage_collection_translation;
-- Relax Massage
INSERT INTO massage_translation (locale, name, subtitle, description, massage_id) VALUES
('es', NULL, 'El arte de desconectar.', 'Masaje relajante de cuerpo completo diseñado para liberar el estrés, calmar la mente y recuperar el equilibrio interior.', 1),
('en', NULL, 'The art of unwinding.', 'A full-body relaxation massage designed to release stress, calm the mind and restore inner balance.', 1);

-- Moon Head Massage
INSERT INTO massage_translation (locale, name, subtitle, description, massage_id) VALUES
('es', NULL, 'Calma para la mente, equilibrio para el cuerpo.', 'Ritual enfocado en cabeza, cuello, hombros y brazos para aliviar la fatiga mental y favorecer la relajación.', 2),
('en', NULL, 'Calm for the mind, balance for the body.', 'A soothing ritual focused on the head, neck, shoulders and arms to ease mental fatigue and promote deep relaxation.', 2);

-- Deep Tissue Massage
INSERT INTO massage_translation (locale, name, subtitle, description, massage_id) VALUES
('es', NULL, 'Recupera el equilibrio de tu cuerpo.', 'Masaje de presión profunda orientado a liberar tensiones musculares, mejorar la movilidad y favorecer la recuperación física.', 3),
('en', NULL, 'Restore your body’s balance.', 'A deep-pressure massage designed to release muscle tension, improve mobility and support physical recovery.', 3);

-- Serenity Touch
INSERT INTO massage_translation (locale, name, subtitle, description, massage_id) VALUES
('es', NULL, 'Una experiencia diseñada para despertar los sentidos.', 'Experiencia envolvente con movimientos suaves, aceites aromáticos y una atmósfera preparada para favorecer el bienestar.', 4),
('en', NULL, 'An experience designed to awaken the senses.', 'An immersive experience combining gentle movements, aromatic oils and a carefully prepared atmosphere for complete wellbeing.', 4);

-- Velvet Touch
INSERT INTO massage_translation (locale, name, subtitle, description, massage_id) VALUES
('es', NULL, 'Relajación sin interrupciones.', 'Experiencia completa que combina masaje y acceso a habitación con cama para prolongar el bienestar y el confort.', 5),
('en', NULL, 'Relaxation without interruptions.', 'A complete experience combining massage with private room access to extend comfort and relaxation.', 5);

-- Signature Maysa
INSERT INTO massage_translation (locale, name, subtitle, description, massage_id) VALUES
('es', NULL, 'La esencia de Maysa.', 'Experiencia insignia de Maysa con bienestar, atención personalizada y detalles premium.', 6),
('en', NULL, 'The essence of Maysa.', 'Maysa’s signature experience, combining wellbeing, personalised attention and premium details.', 6);

-- Gold Experience
INSERT INTO massage_translation (locale, name, subtitle, description, massage_id) VALUES
('es', NULL, 'El lujo de dedicarte tiempo.', 'Experiencia premium acompañada de detalles exclusivos para disfrutar de bienestar en un ambiente sofisticado.', 7),
('en', NULL, 'The luxury of taking time for yourself.', 'A premium experience enhanced with exclusive details in a sophisticated atmosphere.', 7);

-- Serenity Ritual
INSERT INTO massage_translation (locale, name, subtitle, description, massage_id) VALUES
('es', NULL, 'La calma que tu cuerpo necesita.', 'Experiencia completa que combina masaje y acceso privado a ducha para prolongar la sensación de bienestar.', 8),
('en', NULL, 'The calm your body deserves.', 'A complete experience combining massage with private shower access to prolong your feeling of wellbeing.', 8);

-- Moonlight Experience
INSERT INTO massage_translation (locale, name, subtitle, description, massage_id) VALUES
('es', NULL, 'Una experiencia creada para recordar.', 'Experiencia exclusiva que combina masaje, bañera privada y ambientación personalizada.', 9),
('en', NULL, 'An experience made to be remembered.', 'An exclusive experience combining massage, a private bathtub and a personalised atmosphere.', 9);

-- Maysa Duo Experience
INSERT INTO massage_translation (locale, name, subtitle, description, massage_id) VALUES
('es', NULL, 'Compartir el bienestar.', 'Experiencia diseñada para disfrutar en pareja en un entorno exclusivo y cuidadosamente preparado.', 10),
('en', NULL, 'Sharing wellbeing together.', 'A unique experience designed for couples in an exclusive and carefully prepared environment.', 10);

-- Royal Experience
INSERT INTO massage_translation (locale, name, subtitle, description, massage_id) VALUES
('es', NULL, 'Una experiencia reservada para quienes buscan lo extraordinario.', 'Dos profesionales coordinan cada movimiento para crear una experiencia envolvente y exclusiva.', 11),
('en', NULL, 'An experience reserved for those seeking the extraordinary.', 'Two professionals work in perfect harmony to create an exclusive and unforgettable experience.', 11);

INSERT INTO massage_collection_translation (locale, name, description, collection_id) VALUES
('es', NULL, 'Una selección de masajes pensados para liberar tensiones, recuperar el equilibrio y cuidar tu bienestar físico y mental.', 1),
('en', NULL, 'A selection of massages designed to relieve tension, restore balance and enhance your physical and mental wellbeing.', 1),

('es', NULL, 'Experiencias sensoriales creadas para despertar los sentidos mediante un ambiente exclusivo y relajante.', 2),
('en', NULL, 'Sensory experiences designed to awaken the senses in an exclusive and relaxing environment.', 2),

('es', NULL, 'Nuestra colección más exclusiva, donde el lujo, el confort y la atención personalizada se unen para crear experiencias inolvidables.', 3),
('en', NULL, 'Our most exclusive collection, where luxury, comfort and personalised attention come together to create unforgettable experiences.', 3),

('es', NULL, 'Experiencias diseñadas para compartir momentos únicos en pareja, disfrutando del bienestar y la conexión en un ambiente exclusivo.', 4),
('en', NULL, 'Experiences designed for couples to share unique moments of wellbeing and connection in an exclusive setting.', 4);
COMMIT;
