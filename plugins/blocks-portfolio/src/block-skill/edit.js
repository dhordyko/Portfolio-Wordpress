import { __ } from "@wordpress/i18n";

import {
	useBlockProps,
	InspectorControls,
	MediaUpload,
	MediaUploadCheck,
} from "@wordpress/block-editor";
import {
	PanelBody,
	TextControl,
	Button,
	TextareaControl,
} from "@wordpress/components";
import "./editor.scss";

export default function Edit({ attributes, setAttributes, clientId }) {
	const {
		skillIconId,
		skillIconUrl,
		skillPercentage,
		skillLabel,
		imageUrl,
		imageDescription,
	} = attributes;

	const descId = `skill-desc-${skillIconId}`;

	const glightboxConfig = imageDescription
		? `title: ${skillLabel}; description: .${descId}; descPosition: right;`
		: `title: ${skillLabel};`;

	// Root wrapper props (use once per root element)
	const blockProps = useBlockProps({ className: "skill-card-editor" });

	return (
		<>
			<InspectorControls>
				<PanelBody
					title={__("Skill Settings", "blocks-portfolio")}
					initialOpen={true}
				>
					<MediaUploadCheck>
						<MediaUpload
							onSelect={(media) => {
								setAttributes({
									skillIconId: media?.id || 0,
									skillIconUrl: media?.url || "",
								});
							}}
							allowedTypes={["image"]}
							value={skillIconId || 0}
							render={({ open }) => (
								<div>
									<p className="components-base-control__label">
										{__("Skill Icon", "blocks-portfolio")}
									</p>

									{skillIconUrl ? (
										<div style={{ marginBottom: 10 }}>
											<img
												src={skillIconUrl}
												alt=""
												style={{
													width: 60,
													height: 60,
													objectFit: "cover",
													borderRadius: 8,
												}}
											/>
										</div>
									) : null}

									<Button variant="secondary" onClick={open}>
										{skillIconUrl
											? __("Replace Image", "blocks-portfolio")
											: __("Select Image", "blocks-portfolio")}
									</Button>

									{skillIconUrl ? (
										<Button
											variant="tertiary"
											isDestructive
											style={{ marginLeft: 8 }}
											onClick={() =>
												setAttributes({ skillIconId: 0, skillIconUrl: "" })
											}
										>
											{__("Remove", "blocks-portfolio")}
										</Button>
									) : null}
								</div>
							)}
						/>
					</MediaUploadCheck>

					<TextControl
						label={__("Skill Label", "blocks-portfolio")}
						value={skillLabel}
						onChange={(value) => setAttributes({ skillLabel: value })}
						placeholder={__("Figma", "blocks-portfolio")}
					/>
				</PanelBody>
			</InspectorControls>

			<div {...blockProps}>
				<div class="card-wrapper">
					<div className="skill-icon">
						{skillIconUrl ? <img src={skillIconUrl} alt="" /> : null}
					</div>
				</div>
				<div className="skill-label">{skillLabel}</div>
				<TextareaControl
					label={__("Image Description (for Lightbox)", "blocks-portfolio")}
					value={imageDescription || ""}
					onChange={(value) => setAttributes({ imageDescription: value })}
					help={__(
						"You can use basic HTML (e.g., <strong>, <em>, <a>) if needed.",
						"blocks-portfolio",
					)}
				/>
				{imageDescription ? (
					<div className={descId} style={{ display: "none" }}>
						{imageDescription}
					</div>
				) : null}
			</div>
		</>
	);
}
