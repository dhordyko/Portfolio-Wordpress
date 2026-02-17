import { useBlockProps } from "@wordpress/block-editor";

export default function save({ attributes, clientId }) {
	const {
		skillIconUrl,
		skillPercentage,
		skillLabel,
		skillIconId,
		imageDescription,
	} = attributes;

	if (skillIconUrl) {
		const descId = `skill-desc-${skillIconId}`;

		const glightboxConfig = imageDescription
			? `title: ${skillLabel}; description: .${descId}; descPosition: right;`
			: `title: ${skillLabel};`;

		return (
			<>
				<div class="card-wrapper">
					<a
						{...useBlockProps.save({
							className: "skill-card glightbox-skill",
						})}
						href={skillIconUrl}
						data-gallery="skill-gallery"
						data-glightbox={glightboxConfig}
					>
						<div className="skill-icon">
							<img src={skillIconUrl} alt="" />
						</div>
					</a>
					<div className="skill-label">{skillLabel}</div>
					{imageDescription && (
						<div
							className={descId}
							style={{ display: "none" }}
							dangerouslySetInnerHTML={{ __html: imageDescription }}
						/>
					)}
				</div>
			</>
		);
	}

	return (
		<div {...useBlockProps.save({ className: "skill-card-editor" })}>
			<div className="skill-icon">{skillIcon}</div>

			<div className="skill-label">{skillLabel}</div>
		</div>
	);
}
